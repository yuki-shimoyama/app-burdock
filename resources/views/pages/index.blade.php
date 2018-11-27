@php
	$title = __('Contents');
@endphp
@extends('layouts.my')

@section('stylesheet')
<?php
foreach($px2ce_client_resources['css'] as $value) {
	echo '<link href="'.'/assets/px2ce_resources/'.$value.'" rel="stylesheet">';
}
?>
@endsection

@section('javascript')
<?php
foreach($px2ce_client_resources['js'] as $value) {
	echo '<script src="'.'/assets/px2ce_resources/'.$value.'"></script>';
}
?>
@endsection

@section('content')
	<div class="container">
		<h1 id="post-title">{{ $title }}</h1>
		<hr>
		<div id="canvas" style="height:500px; width:800px">
		</div>

		<script type="text/javascript">
		console.log(39);
			pickles2ContentsEditor = new Pickles2ContentsEditor(); // px2ce client
		console.log(40);
		</script>

		<script type="text/javascript">
			pickles2ContentsEditor.init(
				{
					// いろんな設定値
					// これについては Px2CE の README を参照
					// https://github.com/pickles2/node-pickles2-contents-editor
					'page_path': '/index.html' , // <- 編集対象ページのパス
					'elmCanvas': document.getElementById('canvas'), // <- 編集画面を描画するための器となる要素
					'preview':{
						'origin': 'https://prev1.app-burdock.localhost/'// プレビュー用サーバーの情報を設定します。
					},
					'lang': 'en', // language
					// 'customFields': {
					// 	// この設定項目は、 broccoli-html-editor に渡されます
					// 	'custom1': function(broccoli){
					// 		// カスタムフィールドを実装します。
					// 		// この関数は、fieldBase.js を基底クラスとして継承します。
					// 		// customFields オブジェクトのキー(ここでは custom1)が、フィールドの名称になります。
					// 	}
					// },
					// 特に重要なのはこれ。
					// サーバーサイドのGPIに対して値の橋渡しをするコールバックを指定します。
					'gpiBridge': function(input, callback){
						console.log(input);
						$.ajax({
							"url": '/pages/test0001/master', // ←呼び出し元が決める
							"method": 'post',
							'data': {
								'data':JSON.stringify(input),
								 _token: '{{ csrf_token() }}'
							 },
							"success": function(data){
								callback(data);
								console.log(data);
							}
						});
						return;
					},
					'clipboard': {
						// クリップボード操作の機能を拡張できます。
						'set': function( data, type ){
						// クリップボードにコピーする機能を実装してください。
						},
						'get': function( type ){
						// クリップボードからデータを取得する機能を実装してください。
						}
					},
					'complete': function(){
						alert('完了しました。');
					},
					'onClickContentsLink': function( uri, data ){
						alert('編集: ' + uri);
					},
					'onMessage': function( message ){
						// ユーザーへ知らせるメッセージを表示する
						console.info('message: '+message);
					}
				},
				function(){
					// コールバック
					// 初期化完了！
					console.log(41);
				}
			);
			console.log(42);
		</script>
	</div>
@endsection
