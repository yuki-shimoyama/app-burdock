@php
	$title = __('Contents');
@endphp
@extends('layouts.px2')

@section('content')
	<div class="contents" style="margin: 0px; padding: 0px; position: fixed; left: 0px; top: 0px; right: 0px; height: 100vh;">
		<div class="container" data-original-title="" title="">
			<h1 data-original-title="" title="">コンテンツ</h1>
		</div>
		<div class="contents" data-original-title="" title="">
			<div class="container-fluid" data-original-title="" title="">
				<div style="float:right;" data-original-title="" title="">
					<a href="javascript:;" data-placement="bottom" title="" data-original-title="コンテンツは、サイトマップに記述されたページ1つにつき1つ編集します。特別な場合を除き、コンテンツはヘッダー、フッターなどの共通部分(=テーマ領域)を含まない、コンテンツエリアのみのHTMLコードとして管理されています。一覧からページを選択し、コンテンツを編集してください。">
						<span class="glyphicon glyphicon-question-sign" data-original-title="" title=""></span> ヒント
					</a>
				</div>
				<div class="cont_breadcrumb" data-original-title="" title="">
					<ul>
						<li><strong>ホーム</strong></li>
					</ul>
				</div>
			</div>
			<div class="container-fluid" data-original-title="" title="">
				<div class="row" data-original-title="" title="">
					<div class="col-xs-9" data-original-title="" title="">
						<div class="cont_page_info clearfix" data-original-title="" title="">
							<div>
								<div class="cont_page_info-prop">
									<span class="selectable">ホーム ({{ $page_param }})</span>
									<span class="px2-editor-type px2-editor-type--html"></span>
								</div>
								<div class="cont_page_info-btn">
									<div class="btn-group">
										<a href="javascript:void(0);" onclick="window.open('{{ url('/pages/'.$project->project_name.'/'.$branch_name.'?page_path='.$page_param) }}','_blank','width=10000px,height=10000px')" class="btn px2-btn px2-btn--primary px2-btn--lg btn--edit" style="padding-left: 5em; padding-right: 5em;">{{ __('Edit')}}</a>
										<a href="{{ url('https://prev1.app-burdock.localhost'.$page_param) }}" class="btn px2-btn px2-btn--lg btn--preview" target="_blank">ブラウザでプレビュー</a>
										<!-- <button type="button" class="btn px2-btn px2-btn--lg btn--resources">リソース</button> -->
										<button type="button" class="btn px2-btn px2-btn--lg dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu cont_page-dropdown-menu">
											<li style="max-width: 476px; overflow: hidden;">
												<a data-content="/index.html" href="javascript:;">フォルダを開く</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">外部テキストエディタで編集</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html">リソースフォルダを開く</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">コンテンツのソースコードを表示</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" data-page-info="">ページ情報を表示</a>
											</li>
											<li class="divider" style="max-width: 476px; overflow: hidden;"></li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">埋め込みコメントを表示する</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a class="menu-materials" data-path="/index.html" href="javascript:;">素材フォルダを開く (0)</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">コンテンツコメントを編集</a>
											</li>
											<li class="divider" style="max-width: 476px; overflow: hidden;"></li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" data-proc_type="html" href="javascript:;">他のページから複製して取り込む</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" data-proc_type="html" href="javascript:;">編集方法を変更</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" data-proc_type="html" href="javascript:;">このページを単体でパブリッシュ</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">コンテンツをコミット</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">コンテンツのコミットログ</a>
											</li>
											<li style="max-width: 476px; overflow: hidden;">
												<a data-path="/index.html" href="javascript:;">ページをリロード</a>
											</li>
										</ul>
									</div>
									<!-- /btn-group -->
								</div>
							</div>
						</div>
						<div class="preview_window_frame cont_preview" data-original-title="" title="" style="height: 70vh;">
							<div class="preview_window_frame--inner" data-original-title="" title="">
								<iframe data-original-title="" title="" src="{{ url('https://prev1.app-burdock.localhost'.$page_param) }}"></iframe>
							</div>
						</div>
					</div>
					<div class="col-xs-3" data-original-title="" title="">
						<div class="cont_workspace_search" data-original-title="" title="">
							<div class="input-group input-group-sm" data-original-title="" title="">
								<form action="javascript;;" id="cont_search_form" data-original-title="" title="">
									<div class="input-group" data-original-title="" title="">
										<input type="text" class="form-control" placeholder="Search..." data-original-title="" title="">
										<span class="input-group-btn" data-original-title="" title="">
											<button class="px2-btn px2-btn--primary" type="submit" data-original-title="" title="">検索</button>
										</span>
									</div>
									<!-- /input-group -->
									<div class="btn-group btn-group-justified" data-toggle="buttons" data-original-title="" title="">
										<label class="btn px2-btn active" data-original-title="" title="">
											<input type="radio" name="list-label" value="title" checked="checked" data-original-title="" title="">title
										</label>
										<label class="btn px2-btn" data-original-title="" title="">
											<input type="radio" name="list-label" value="path" data-original-title="" title="">path
										</label>
									</div>
								</form>
							</div>
						</div>
						<!-- /.cont_workspace_search -->
						<div class="cont_workspace_container" data-original-title="" title="" style="height: 100vh; margin-top: 10px;">
							<div class="cont_sitemap_parent" data-original-title="" title="">

							</div>
							<div class="cont_sitemap_broslist" data-original-title="" title="" style="height: 100vh;">
								<ul class="listview">
									<li><a href="{{ url('/pages/'.$project->project_name.'/'.$branch_name.'/index.html?page_path='.'%2Findex.html') }}" class="current">ホーム</a>
										<ul>
											<li><a href="{{ url('/pages/'.$project->project_name.'/'.$branch_name.'/index.html?page_path='.'%2Fsample_pages%2Findex.html') }}" style="font-size: 80%;">はじめに</a></li>
											<li><a href="{{ url('/pages/'.$project->project_name.'/'.$branch_name.'/index.html?page_path='.'%2Fsample_pages%2Ftraining%2Findex.html') }}" style="font-size: 80%;">編集してみょう</a></li>
											<li><a href="{{ url('/pages/'.$project->project_name.'/'.$branch_name.'/index.html?page_path='.'%2Fsample_pages%2Fsamples%2Findex.html') }}" style="font-size: 80%;">さまざまな機能</a></li>
											<li><a href="{{ url('/pages/'.$project->project_name.'/'.$branch_name.'/index.html?page_path='.'%2Fsample_pages%2Fhelp%2Findex.html') }}" style="font-size: 80%;">ヘルプ</a></li>
										</ul>
									 </li>
								 </ul>
							</div>
							<div class="cont_sitemap_search" data-original-title="" title="" style="display: none;"></div>
						</div>
						<!-- /.cont_workspace_container -->
						<div class="cont_comment_view" data-original-title="" title="" data-path="/index.html" style="display: none;">no comment.</div>
						<!-- /.cont_comment_view -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
