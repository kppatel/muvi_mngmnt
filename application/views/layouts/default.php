<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
	<head>

		<meta charset="utf-8">
			<title><?php echo $template['title'] ?></title>
			<meta name="description" content="">

				<?php echo css('style') ?>
				<?php echo js('jquery'), js('script') ?>

				</head>
				<body>
					<div id="art-main">
						<div class="cleared reset-box"></div>
						<div class="art-bar art-nav">
							<div class="art-nav-outer">
								<div class="art-nav-wrapper">
									<div class="art-nav-inner">
										<ul class="art-hmenu">
											<li><?php echo anchor('movies/index', 'Movies'); ?></li>
											<li><?php echo anchor('directors/index', 'Directors'); ?></li>
											<li><?php echo anchor('producers/index', 'Producers'); ?></li>
											<li><?php echo anchor('categories/index', 'Categories'); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="cleared reset-box"></div>
						<div class="art-header">
							<div class="art-header-position">
								<div class="art-header-wrapper">
									<div class="cleared reset-box"></div>
									<div class="art-header-inner">
										<div class="art-logo">
											<h1 class="art-logo-name"><a href="#">Movie Management</a></h1>
											<h2 class="art-logo-text"></h2>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="cleared reset-box"></div>
						<div class="art-box art-sheet">
							<div class="art-box-body art-sheet-body">
								<div class="art-layout-wrapper">
									<div class="art-content-layout">
										<div class="art-content-layout-row">
											<div class="art-layout-cell art-content">
												<div class="art-box art-post">
													<div class="art-box-body art-post-body">
														<div class="art-post-inner art-article">
															<div class="art-postcontent">
																<?php echo $template['body'] ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="art-footer">
									<div class="art-footer-body">
										<div class="art-footer-text"><p>
												<a href="#">Movies</a> | <a href="#">Directors</a> | <a href="#">Producers</a> | <a href="#">Categories</a>
											</p></div>
									</div>
								</div>
								<div class="cleared"></div>
							</div>
						</div>
						<div class="cleared"></div>
						<p class="art-page-footer"><a href="http://www.artisteer.com/?p=blogger_templates" target="_blank">Blogger Template</a> created with Artisteer.</p>
					</div>

				</body>
				</html>
