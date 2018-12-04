<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pickles 2</title>
	<meta name="viewport" content="width=device-width">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!-- jQuery -->
	<script src="/common/scripts/jquery-2.2.4.min.js" type="text/javascript"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/common/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/common/bootstrap/css/bootstrap.css">
	<script src="/common/bootstrap/js/bootstrap.min.js"></script>
	<!-- normalize & FESS -->
	<link rel="stylesheet" href="/common/styles/contents.css" type="text/css">
    <link rel="stylesheet" href="/common/styles/fess.css" type="text/css">
	<!-- Pickles 2 Style -->
	<link rel="stylesheet" href="/common/px2style/dist/styles.css" charset="utf-8">
	<script src="/common/px2style/dist/scripts.js" charset="utf-8"></script>
    <!-- Local Resources -->
	<link rel="stylesheet" href="/common/index_files/style.css" type="text/css" data-original-title="" title="">
    <link rel="stylesheet" href="/common/index_files/styles.css" type="text/css" data-original-title="" title="">
</head>
<body>
	<div class="theme_wrap">
		<header class="theme-header" style="border-bottom-color: rgb(0, 160, 230); color: rgb(0, 160, 230);">
			<div class="theme-header__inner clearfix">
				<div class="theme-header__px2logo" style="width: 45px; height: 45px;">
					<img src="/common/images/logo.svg">
				</div>
				<div class="theme-header__id" style="opacity: 1;">
                    <div>test</div>
                </div>
				<div class="theme-header__gmenu">
                    <ul>
                        <li><span>&nbsp;</span></li>
                        <li><a href="javascript:;">ホーム</a></li>
                        <li><a href="javascript:;">サイトマップ</a></li>
                        <li><a href="javascript:;">テーマ</a></li>
                        <li><a href="javascript:;" class="current">コンテンツ</a></li>
                        <li><a href="javascript:;">パブリッシュ</a></li>
                    </ul>
                </div>
				<div class="theme-header__shoulder-menu" style="width: 50px; height: 33px;">
					<button style="height: 33px;">≡</button>
					<ul style="display: none; top: 30px; height: 892px;">
                        <li><a href="javascript:;">ダッシュボード</a></li>
                        <li><a href="javascript:;">フォルダを開く</a></li>
                        <li><a href="javascript:;">ブラウザで開く</a></li>
                        <li><a href="javascript:;">テキストエディタで開く</a></li>
                        <li><a href="javascript:;">Gitクライアントで開く</a></li>
                        <li><a href="javascript:;">コマンドラインで開く</a></li>
                        <li><a href="javascript:;">プロジェクト共有設定(config.php)</a></li>
                        <li><a href="javascript:;">composer</a></li>
                        <li><a href="javascript:;">git</a></li>
                        <li><a href="javascript:;">プレビュー</a></li>
                        <li><a href="javascript:;">検索</a></li>
                        <li><a href="javascript:;">モジュール</a></li>
                        <li><a href="javascript:;">スタイルガイド生成</a></li>
                        <li><a href="javascript:;">コンテンツを一括加工</a></li>
                        <li><a href="javascript:;">コンテンツを移動する</a></li>
                        <li><a href="javascript:;">GUI編集コンテンツを一括再構成</a></li>
                        <li><a href="javascript:;">キャッシュを消去</a></li>
                        <li><a href="javascript:;">システム情報</a></li>
                        <li><a href="javascript:;">Pickles 2 アプリケーション設定</a></li>
                        <li><a href="javascript:;">ヘルプ</a></li>
                        <li><a href="javascript:;">デペロッパツール</a></li>
                        <li><a href="javascript:;">終了</a></li>
                    </ul>
				</div>
			</div>
		</header>
        <div>
            @yield('content')
        </div>
		<footer class="theme-footer">
		</footer>
	</div>
</body>
</html>
