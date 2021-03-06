@php
	$title = __('Contents');
@endphp
@extends('layouts.px2_broccoli')

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
<div>
	<div id="canvas" style="height:100vh;">
	</div>

	<script type="text/javascript">
		pickles2ContentsEditor = new Pickles2ContentsEditor(); // px2ce client
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.js"></script>
	<script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/monokai");
	editor.setFontSize(14);
	editor.getSession().setMode("ace/mode/html");
	editor.getSession().setUseWrapMode(true);
	editor.getSession().setTabSize(2);
	</script>

	<script type="text/javascript">
		var project_name = <?php echo json_encode($project->project_name); ?>;
		var branch_name = <?php echo json_encode($branch_name); ?>;
		var page_param = <?php echo json_encode($page_param); ?>;

		pickles2ContentsEditor.init(
			{
				// いろんな設定値
				// これについては Px2CE の README を参照
				// https://github.com/pickles2/node-pickles2-contents-editor
				'page_path': '/'+page_param , // <- 編集対象ページのパス
				'elmCanvas': document.getElementById('canvas'), // <- 編集画面を描画するための器となる要素
				'preview':{
					'origin': 'https://prev1.app-burdock.localhost/'// プレビュー用サーバーの情報を設定します。
				},
				'lang': 'en', // language
				'customFields': {
					// この設定項目は、 broccoli-html-editor に渡されます
					'custom1': function(broccoli){
						// カスタムフィールドを実装します。
						// この関数は、fieldBase.js を基底クラスとして継承します。
						// customFields オブジェクトのキー(ここでは custom1)が、フィールドの名称になります。
					}
				},
				// 特に重要なのはこれ。
				// サーバーサイドのGPIに対して値の橋渡しをするコールバックを指定します。
				'gpiBridge': function(input, callback){
					console.log(input);
					$.ajax({
						"url": '/pages/'+project_name+'/'+branch_name+'?page_path='+page_param, // ←呼び出し元が決める
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
					window.open('about:blank','_self').close();
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
			}
		);
		console.log($(window).width());
		console.log($(window).height());
	</script>
</div>
@endsection
