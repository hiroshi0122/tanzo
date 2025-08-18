<?php
// 会社情報
$company_info = [
    [
        'title' => '社　　名',
        'value' => 'ヤマコー株式会社',
    ],
    [
        'title' => '設　　立',
        'value' => '1952年5月1日',
    ],
    [
        'title' => 'E-mail',
        'value' => 'yamaco@tanzo-jp.com',
    ],
    [
        'title' => '資本金',
        'value' => '45,000,000円',
    ],
    [
        'title' => '代表取締役',
        'value' => '山本恵津子',
    ],
    [
        'title' => '従業員数',
        'value' => '37名（2025年4月現在）',
    ],
    [
        'title' => '事業内容',
        "value" => "鍛造部品（熱間・冷間・複合鍛造・機械加工）\nCFRP熱可塑成厚物成形（YTC工法）",
    ],
    [
        'title' => 'URL',
        'value' => 'https://www.yamaco-forging.co.jp/',
    ],
    [
        'title' => '住　　所',
        'value' => '〒578-0901 大阪府東大阪市加納4丁目3番26号',
    ],
    [
        'title' => 'TEL',
        'value' => '072-965-5621',
    ],
    [
        'title' => 'FAX',
        'value' => '072-965-5513',
    ],
];

?>


<section class="company-sec">
    <div class="container">
        <?php if ( is_page('company') ) : ?>
            <table class="company-info-table page-company">
                <tbody>
                    <?php foreach($company_info as $info):?>
                    <tr>
                        <th><?php echo esc_html($info['title']); ?></th>
                        <td><?php echo nl2br(esc_html($info['value'])); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else :?>
            <div class="row">
                <div class="col-md-3">
                    <div class="main-title blur">
                        <span>Company</span>
                        <h2 class="daily-title">会社概要</h2>
                    </div>
                    <div class="btn-area">
                        <a class="btn-view-more" href="https://www.yamaco-forging.co.jp/" target="_blank" rel="noopener">企業サイトへ >>></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <table class="company-info-table">
                        <tbody>
                            <?php foreach($company_info as $info):?>
                            <tr>
                                <th><?php echo esc_html($info['title']); ?></th>
                                <td><?php echo nl2br(esc_html($info['value'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>