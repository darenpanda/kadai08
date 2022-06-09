<!-- ここから変更 -->
<?php
include 'lib/secure.php';
include 'lib/connect.php';
include 'lib/queryArticle.php';
include 'lib/article.php';
?>

$title = "";        // タイトル
  $body = "";         // 本文
  $title_alert = "";  // タイトルのエラー文言
  $body_alert = "";   // 本文のエラー文言

  if (!empty($_POST['title']) && !empty($_POST['body'])){
    // titleとbodyがPOSTメソッドで送信されたとき
    $title = $_POST['title'];
    $body = $_POST['body'];
    
    // ===== ここから変更 =====
    $article = new Article();
    $article->setTitle($title);
    $article->setBody($body);
    $article->save();


    header('Location: login.php');

  ?>

  <!doctype html>
  <html lang="ja">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理画面</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        padding-top: 5rem;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bg-red {
        background-color: #a0d8ef !important;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="./css/blog.css" rel="stylesheet">
  </head>

<body>
  <?php include('lib/nav.php'); ?>

  <nav class="navbar navbar-expand-md navbar-dark bg-red fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/blog/backend.php">管理画面</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item"><a class="nav-link" href="#">登録</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="row">
      <div class="col-md-12">

        <!-- ここから変更・追加 -->
        <h1>記事の投稿</h1>

        <form action="post.php" method="post">
          <div class="mb-3">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">本文</label>
            <textarea name="body" class="form-control" rows="10"></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">投稿する</button>
          </div>
        </form>

        <!-- ここまで変更・追加 -->

      </div>

    </div><!-- /.row -->

  </main><!-- /.container -->

</body>

</html>