# 就労支援施設 ユニクラweb


### Pre-conditions
- docker
- docker-compose
- git
- VOLTA 

### Docker環境
- mariaDB latest
- Wordpress latest

## 開発の準備
env-example.txtを.envとしてコピーしてください。(.envファイルはルートに設置)  

### 初期変更箇所
テーマ名を指定する。  

.env
```
WORDPRESS_THEME={テーマ名}
```

.gitignore
```
# 63行目
!wp/wp-content/themes/{テーマ名}/
```

webpack.config.js
```
const THEME = '{テーマ名}';
```

## 現状のWPテーマ作成ファイルの開発環境の起動

### dockerコンテナの立ち上げ
```
make up
```
⇨dockerを使用するので、コンテナを立ち上げる。  
⇨オプション「-d」を指定することで、バックグラウンドで動く。なので、ターミナルを占拠しない  

### npmのインストール（node modhuleなど）
```
npm install
```
⇨開発環境に必要なnode_modhulesをインストール（プロジェクトディレクトリにダウンロード）  
⇨package.jsonにVOLTAの記述もあるので、nodeも都度インストールされる  
⇨VOLTAのversionの記載は、latestのような漠然とした書き方は適応されないので、注意。  

### 開発サーバーの起動
```
npm start
```
⇨server.jsが起動。`http://localhost:3000/`でwatch状態の開発環境が起動  
⇨scssの変更、jsの変更、画像の自動圧縮などの処理が変更の都度走る  

### Default Library
- Bootstrap v5.0.0

