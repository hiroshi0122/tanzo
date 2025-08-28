<?php
//**************************************************************
// wp head cleaner
//**************************************************************
/* DNS prefetch ※外部ドメインの名前解決を事前に行い、表示速度を上げます。 */
function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


//**************************************************************
// admin screen setup
//**************************************************************
// 投稿の管理画面から、アイキャッチ画像を登録する場所を作る
add_theme_support('post-thumbnails'); // icatch表示

add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
});


add_action('admin_init', function () {
  $types = ['products']; // ここに対象のスラッグ並べる
  foreach ($types as $pt) {
    add_filter("manage_{$pt}_posts_columns", function ($columns) {
      $new = [];
	foreach ($columns as $key => $value) {
		$new[$key] = $value;
		if ($key === 'title') { // title列の後に挿入
		$new['thumbnail'] = 'アイキャッチ';
		}
	}
  return $new;
    });
    add_action("manage_{$pt}_posts_custom_column", function ($column, $post_id) {
      if ($column === 'thumbnail') {
        echo has_post_thumbnail($post_id)
          ? get_the_post_thumbnail($post_id, 'thumbnail')
          : '—';
      }
    }, 10, 2);
  }
});

// 見た目の幅を調整（任意）
add_action('admin_head', function () {
  echo '<style>
    .column-thumbnail{width:70px}
    .column-thumbnail img{width:60px;height:auto;border-radius:4px}
  </style>';
});

//**************************************************************
// 管理画面：ユーザーのカスタマイズ
//**************************************************************
// 役職の入力欄を追加
function add_user_meta_fields($user) {
    ?>
    <h3>役職情報</h3>
    <table class="form-table">
        <tr>
            <th><label for="position">役職</label></th>
            <td>
                <input type="text" name="position" id="position" value="<?php echo esc_attr(get_the_author_meta('position', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description">役職を入力してください。</span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'add_user_meta_fields');
add_action('edit_user_profile', 'add_user_meta_fields');

function save_user_meta_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'position', $_POST['position']);
}
add_action('personal_options_update', 'save_user_meta_fields');
add_action('edit_user_profile_update', 'save_user_meta_fields');




//**************************************************************
// slug ID 取得
//**************************************************************
function get_slug_id() {
	$post_obj =  $GLOBALS['wp_the_query']->get_queried_object();
	$slug = '';
	if (is_front_page()) {
		$slug = 'top';
		if(is_page() && get_post( get_the_ID() )->post_name) {
			$slug = $post_obj->post_name;
		}
	} elseif (is_page()) {
		$slug = $post_obj->post_name;
	} elseif (is_category()) {
		$slug = $post_obj->category_nicename;
	}  elseif (is_tag()) {
		$slug = $post_obj->slug;
	} elseif (is_singular()) {
		$slug = $post_obj->post_name;
	} elseif (is_post_type_archive()) {
		$slug = get_post_type_object(get_post_type())->name;
	} elseif (is_search()) {
		$slug  = $GLOBALS['wp_the_query']->posts ? 'search-results' : 'search-no-results';
	} elseif (is_404()) {
		$slug = 'error404';
	}
	return $slug;
}


//**************************************************************
// create Token
//**************************************************************
function getCSRFToken()
{
	return sha1(uniqid(rand(), true));
}


//**************************************************************
// 西暦 or 和暦 変換
//**************************************************************
function convGtJDate($year) {

	if ($year >= 2019) {
		$gengo = '令和';
		$wayear = $year - 2018;
	} elseif ($year >= 1989) {
		$gengo = '平成';
		$wayear = $year - 1988;
	} elseif ($year >= 1926) {
		$gengo = '昭和';
		$wayear = $year - 1925;
	} elseif ($year >= 1912) {
		$gengo = '大正';
		$wayear = $year - 1911;
	} else {
		$gengo = '明治';
		$wayear = $year - 1868;
	}
	switch ($wayear) {
		case 1:
		$wadate = $gengo.'元年';
		break;
		default:
		$wadate = $gengo.sprintf("%02d", $wayear).'年';
	}
	return $wadate;
}
function convJtGDate($src) {
	$a = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
	$g = mb_substr($src, 0, 2, 'UTF-8');
	array_unshift($a, $g);
	if (($g !== '明治' && $g !== '大正' && $g !== '昭和' && $g !== '平成'&& $g !== '令和')
	|| (str_replace($a, '', $src) !== '年月日' && str_replace($a, '', $src) !== '元年月日')) return false;
	$y = strtok(str_replace($g, '', $src), '年月日');
	$m = strtok('年月日');
	$d = strtok('年月日');
	if (mb_strpos($src, '元年') !== false) $y = 1;
	if ($g === '令和') $y += 2018;
	elseif ($g === '平成') $y += 1988;
	elseif ($g === '昭和') $y += 1925;
	elseif ($g === '大正') $y += 1911;
	elseif ($g === '明治') $y += 1868;
	if (strlen($y) !== 4 || strlen($m) !== 2 || strlen($d) !== 2 || !@checkdate($m, $d, $y)) return false;
	return $y.'/'.$m.'/'.$d;
}

//**************************************************************
// 投稿抜粋の文字数をPCとSPで分岐する
//**************************************************************
function custom_excerpt_length($length) {
    if (wp_is_mobile()) {
        return 100; // モバイルの場合の抜粋の文字数
    } else {
        return 100; // PCの場合の抜粋の文字数
    }
}

function custom_excerpt_more($more) {
    return '...';
}

function custom_trim_excerpt($text, $length) {
    if (mb_strlen($text) > $length) {
        $text = mb_substr($text, 0, $length) . '...';
    }
    return $text;
}

// デフォルトの抜粋長を変更
add_filter('excerpt_length', 'custom_excerpt_length', 999);
add_filter('excerpt_more', 'custom_excerpt_more');


//**************************************************************
// 投稿　次／前の投稿URL取得
//**************************************************************
function get_adjacent_post_url( $previous = true ) {
	$post = get_adjacent_post( false, '', $previous );  // 2get_adjacent_post()は隣接する投稿を取得する関数で、第3引数で前後を指定
	$url  = '';
	if( !empty( $post ) ) {
		$url = [
			'title' => $post->post_title, // 件名取得
			'url' => get_permalink( $post->ID ) // URL取得
		];
	}
	return $url;
}


//**************************************************************
// スラッグの日本語名禁止
//**************************************************************
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
		$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	}
	return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );


//**************************************************************
// パンくずリスト
//**************************************************************
function output_breadcrumb(){
	$home = '<li><a href="'.get_bloginfo('url').'">トップ</a></li>';
	echo '<ul class="breadcrumb">';

	// トップページの場合
	if ( is_front_page() ) {

		// カテゴリーページの場合
	} else if ( is_category() ) {
		$cat = get_queried_object();
		$cat_id = $cat->parent;
		$cat_list = array();
		while($cat_id != 0) {
			$cat = get_category( $cat_id );
			$cat_link = get_category_link( $cat_id );
			array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
			$cat_id = $cat->parent;
		}
		echo $home;
		foreach ($cat_list as $value) {
			echo $value;
		}
		the_archive_title('<li>', '</li>');

		// アーカイブページの場合
	} else if ( is_archive() ) {
		echo $home;
		the_archive_title('<li>', '</li>');

		// 投稿ページの場合
	} else if ( is_single() ) {
		$cat = get_the_category();

		if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
		$cat_list = array();

		while( $cat_id != 0 ) {
			$cat = get_category( $cat_id );
			$cat_link = get_category_link( $cat_id );
			array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'>></a></li>' );
			$cat_id = $cat->parent;
		}
		echo $home;
		foreach($cat_list as $value) {
			echo $value;
		}
		// the_title('<li>', '</li>');

		// 固定ページの場合
	} else if ( is_page() ) {
		echo $home;
		the_title('<li>', '</li>');

		// 検索結果の場合
	} else if ( is_search() ) {
		echo $home;
		echo '<li>「'.get_search_query().'」の検索結果</li>';

		// 404ページの場合
	} else if ( is_404() ) {
		echo $home;
		echo '<li>ページが見つかりません</li>';
	}
	echo '</ul>';
}



//**************************************************************
// 管理画面 投稿一覧　カラムのカスタマイズ
//**************************************************************
// サムネイル、ID、文字数の表示
function add_posts_columns($columns) {

	$columns['thumbnail'] = 'アイキャッチ';
	$columns['postid'] = 'ID';
	$columns['count'] = '字数';
	$columns['pickUp'] = "ピックアップ";

	return $columns;
}

function add_posts_columns_row($column_name, $post_id) {
	if ( 'thumbnail' == $column_name ) {
		$thumb = get_the_post_thumbnail($post_id, array(60,60), 'thumbnail');
		echo ( $thumb ) ? $thumb : '－';
	} elseif ( 'postid' == $column_name ) {
		echo $post_id;
	} elseif ( 'count' == $column_name ) {
		$count = mb_strlen(strip_tags(get_post_field('post_content', $post_id)));
		echo $count;
	}
}
add_filter( 'manage_posts_columns', 'add_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 10, 2 );


// 投稿画面の表示のカスタマイズ
function colwidth_css(){
	?><style>
	th#title{
		width:240px;
	}

	th#author,th#tags,th#categories{
		width:100px;
	}

	th#date{
		width:110px;
	}

	th#post_thumb{
		width:30px;
	}
	td.column-post_thumb img{
		max-height:32px!important;
	}
</style><?php
}
add_action('admin_head','colwidth_css');



//**************************************************************
// 閲覧数でランキング順番 記事
//**************************************************************

// 投稿一覧に[閲覧数]列を追加する
add_filter( 'manage_posts_columns', function( $columns ) {
	$columns['views'] = '閲覧数';
	return $columns;
} );
// カスタムフィールドの値(集計した閲覧数)を表示
add_action( 'manage_posts_custom_column', function( $column_name, $post_id ) {
	if ( $column_name == 'views' ) {
		$views = intval( get_post_meta( $post_id, 'custom_views', true ) );
		echo $views;
	}
}, 10, 2 );


//**************************************************************
// 閲覧数でランキング順番 記事
//**************************************************************
// 記事のPVを取得
function getPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count=='') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}

// 記事のPVをカウントする
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count=='') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}

	// デバッグ start
	// echo '';
	// echo 'console.log("postID: ' . $postID .'");';
	// echo 'console.log("カウント: ' . $count .'");';
	// echo '';
	// デバッグ end
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


// タイトルにHTMLを許可するフィルターフック
function allow_br_in_title($title) {
    if (is_singular() && in_the_loop() && is_main_query()) {
        $title = str_replace('.', '<br>', $title);
    }
    return $title;
}
add_filter('the_title', 'allow_br_in_title', 10, 2);


//**************************************************************
// 投稿に紐づくタグ一覧を取得する
//**************************************************************
function display_post_tags($post_id) {
    $post_tags = get_the_tags($post_id);
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            $tag_link = get_tag_link($tag->term_id);
            echo '<a href="' . esc_url($tag_link) . '" class="tag col-auto">' . '#' . esc_html($tag->name) . '</a> ';
        }
    }
}

//**************************************************************
// カスタム投稿もタグ一覧のクエリー内に含む
//**************************************************************
function include_custom_post_types_in_tag( $query ) {
    if ( $query->is_tag() && $query->is_main_query() && !is_admin() ) {
        // カスタム投稿タイプを追加
        $query->set( 'post_type', array( 'post', 'feature', 'columns', 'review' ) );
    }
}
add_action( 'pre_get_posts', 'include_custom_post_types_in_tag' );