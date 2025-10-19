<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    <link rel="stylesheet" href="/css/styles.css">
    <!-- 「flatpickr」：デフォルトスタイルシートをインポート -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- 「flatpickr」：ブルーテーマの追加スタイルシートをインポート -->
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
</head>
<body>
<main>
    <!--
    *   extends：親ビューを継承する（読み込む）
    *   親ビュー名：layout を指定
    -->
    @extends('layout')

    <!--
    *   section：子ビューにsectionでデータを定義する
    *   セクション名：scripts を指定
    *   用途：javascriptライブラリー「flatpickr」のスタイルシートを指定
    -->
    @section('styles')
        <!-- 「flatpickr」の デフォルトスタイルシートをインポート -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- 「flatpickr」の ブルーテーマの追加スタイルシートをインポート -->
        <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    @endsection
    <!--
*   section：子ビューにsectionでデータを定義する
*   セクション名：content を指定
*   用途：タスクを追加するページのHTMLを表示する
-->
@section('content')
    <div class="container">
        <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">タスクを追加する</div>
                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('tasks.create', ['id' => $folder_id]) }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="due_date">期限</label>
                            <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        </div>
    </div>
@endsection

<!--
*   section：子ビューで定義したデータを表示する
*   セクション名：scripts を指定
*   目的：flatpickr によるカレンダー形式による日付選択
*   用途：javascriptライブラリー「flatpickr」のインポート
-->
@section('scripts')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    flatpickr(document.getElementById('due_date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
</script>
@endsection
</main>
<!--
* 「flatpickr」javascriptライブラリー
* 機能：日付のカレンダー表示からの日付取得
-->
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    flatpickr(document.getElementById('due_date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
</script>
<!-- 「flatpickr」の デフォルトスタイルシートをインポート -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- 「flatpickr」の ブルーテーマの追加スタイルシートをインポート -->
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

<!-- 「flatpickr」をインポート -->
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<!-- flatpickr」の 日本語化のための追加スクリプト -->
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    /* flatpickr(指定要素名, オプション) */
    flatpickr(document.getElementById('due_date'), {
        /* 言語設定：日本語を指定 */
        locale: 'ja',
        /* 日付形式：年月日を指定 */
        dateFormat: "Y/m/d",
        /* 開始日設定（選択日付の最小値）：現在日より過去日付を制限するに指定 */
        minDate: new Date()
    });
</script>
</body>
</html>