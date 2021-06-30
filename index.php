<?php
    require_once 'helpers.php';

    if (session_status() === PHP_SESSION_NONE) session_start();

    $title = 'Возвращаем VPN в Opera';
    $valid = ['Secure Preferences', 'Secure Preferences.backup'];

    if (isset($_FILES['files'])) {
        require_once 'redaction.php';

        try {
            $redaction = new Redaction($_FILES);
            $redaction->validate($valid)->generate()->download();
            exit;
        } catch (\Exception $e) {
            $_SESSION['_flash']['error'] = $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Как вернуть VPN в браузере Opera и Opera GX">
    <meta name="keywords" content="opera, opera gx, vpn, opera vpn, opera gx vpn, возвращение vpn opera, вернуть vpn opera">
    <link rel="apple-touch-icon" sizes="180x180" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/apple-touch-icon.f41fd1c7b8eb.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/favicon-32x32.d80e4bdc6a9f.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/favicon-16x16.a0ae29f84c8a.png">
    <link rel="manifest" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/site.3f73f08fba75.webmanifest">
    <link rel="mask-icon" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/safari-pinned-tab.c03376804cdc.svg" color="#ff0a21">
    <link rel="shortcut icon" href="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/favicon.12c955371a4b.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://cdn-production-opera-website.operacdn.com/staticfiles/assets/images/favicon/browserconfig.f5848516ccd3.xml">
    <meta name="theme-color" content="#ffffff">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .opera {
            width: 5rem;
            height: 5rem;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNzUuNTkxIDc1LjU5MSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CjxsaW5lYXJHcmFkaWVudCBpZD0iYSIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgwIC01NC45NDQgLTU0Ljk0NCAwIDIzLjYyIDc5LjQ3NCkiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4Mj0iMSI+CjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmMWIyZCIvPgo8c3RvcCBvZmZzZXQ9Ii4zIiBzdG9wLWNvbG9yPSIjZmYxYjJkIi8+CjxzdG9wIG9mZnNldD0iLjYxNCIgc3RvcC1jb2xvcj0iI2ZmMWIyZCIvPgo8c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNhNzAwMTQiLz4KPC9saW5lYXJHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJiIiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDAgLTQ4LjU5NSAtNDguNTk1IDAgMzcuODU0IDc2LjIzNSkiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4Mj0iMSI+CjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzljMDAwMCIvPgo8c3RvcCBvZmZzZXQ9Ii43IiBzdG9wLWNvbG9yPSIjZmY0YjRiIi8+CjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmNGI0YiIvPgo8L2xpbmVhckdyYWRpZW50Pgo8ZyB0cmFuc2Zvcm09Im1hdHJpeCgxLjMzMzMgMCAwIC0xLjMzMzMgMCAxMDcuMikiPgo8cGF0aCBkPSJtMjguMzQ2IDgwLjM5OGMtMTUuNjU1IDAtMjguMzQ2LTEyLjY5MS0yOC4zNDYtMjguMzQ2IDAtMTUuMjAyIDExLjk2OC0yNy42MDkgMjYuOTk2LTI4LjMxMy40NDg0OC0uMDIxMTUuODk3NjYtLjAzMzE0IDEuMzUwNC0uMDMzMTQgNy4yNTc0IDAgMTMuODc2IDIuNzI4OSAxOC44OTEgNy4yMTM3LTMuMzIyNy0yLjIwMzYtNy4yMDc0LTMuNDcxNS0xMS4zNTktMy40NzE1LTYuNzUwNCAwLTEyLjc5NiAzLjM0ODgtMTYuODYyIDguNjI5Ny0zLjEzNDQgMy42OTk5LTUuMTY0NSA5LjE2OTEtNS4zMDI4IDE1LjMwN3YxLjMzNDljLjEzODIxIDYuMTM3NyAyLjE2ODMgMTEuNjA4IDUuMzAyIDE1LjMwNyA0LjA2NjYgNS4yODA5IDEwLjExMiA4LjYyOTcgMTYuODYyIDguNjI5NyA0LjE1MjYgMCA4LjAzOC0xLjI2NzkgMTEuMzYxLTMuNDcyOS00Ljk5MDQgNC40NjQzLTExLjU2OSA3LjE4NzYtMTguNzg2IDcuMjE0NC0uMDM1OTYgMC0uMDcxMjIuMDAxNC0uMTA3MTguMDAxNHoiIGZpbGw9InVybCgjYSkiLz4KPHBhdGggZD0ibTE5LjAxNiA2OC4wMjVjMi42MDEzIDMuMDcwOSA1Ljk2MDcgNC45MjI3IDkuNjMxIDQuOTIyNyA4LjI1MjQgMCAxNC45NDEtOS4zNTYgMTQuOTQxLTIwLjg5N3MtNi42ODkxLTIwLjg5Ny0xNC45NDEtMjAuODk3Yy0zLjY3MDMgMC03LjAyOTcgMS44NTEtOS42MzAzIDQuOTIyIDQuMDY1OS01LjI4MDkgMTAuMTExLTguNjI5NyAxNi44NjItOC42Mjk3IDQuMTUxOSAwIDguMDM2NiAxLjI2NzkgMTEuMzU5IDMuNDcxNSA1LjgwMiA1LjE5MDYgOS40NTU0IDEyLjczNSA5LjQ1NTQgMjEuMTMzIDAgOC4zOTctMy42NTI3IDE1Ljk0MS05LjQ1MzMgMjEuMTMxLTMuMzIzNCAyLjIwNS03LjIwODggMy40NzI5LTExLjM2MSAzLjQ3MjktNi43NTA0IDAtMTIuNzk2LTMuMzQ4OC0xNi44NjItOC42Mjk3IiBmaWxsPSJ1cmwoI2IpIi8+CjwvZz4KPC9zdmc+');
            background-size: contain;
            display: block;
        }
        .github {
            width: 2rem;
            height: 2rem;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAyNCIgaGVpZ2h0PSIxMDI0IiB2aWV3Qm94PSIwIDAgMTAyNCAxMDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTggMEMzLjU4IDAgMCAzLjU4IDAgOEMwIDExLjU0IDIuMjkgMTQuNTMgNS40NyAxNS41OUM1Ljg3IDE1LjY2IDYuMDIgMTUuNDIgNi4wMiAxNS4yMUM2LjAyIDE1LjAyIDYuMDEgMTQuMzkgNi4wMSAxMy43MkM0IDE0LjA5IDMuNDggMTMuMjMgMy4zMiAxMi43OEMzLjIzIDEyLjU1IDIuODQgMTEuODQgMi41IDExLjY1QzIuMjIgMTEuNSAxLjgyIDExLjEzIDIuNDkgMTEuMTJDMy4xMiAxMS4xMSAzLjU3IDExLjcgMy43MiAxMS45NEM0LjQ0IDEzLjE1IDUuNTkgMTIuODEgNi4wNSAxMi42QzYuMTIgMTIuMDggNi4zMyAxMS43MyA2LjU2IDExLjUzQzQuNzggMTEuMzMgMi45MiAxMC42NCAyLjkyIDcuNThDMi45MiA2LjcxIDMuMjMgNS45OSAzLjc0IDUuNDNDMy42NiA1LjIzIDMuMzggNC40MSAzLjgyIDMuMzFDMy44MiAzLjMxIDQuNDkgMy4xIDYuMDIgNC4xM0M2LjY2IDMuOTUgNy4zNCAzLjg2IDguMDIgMy44NkM4LjcgMy44NiA5LjM4IDMuOTUgMTAuMDIgNC4xM0MxMS41NSAzLjA5IDEyLjIyIDMuMzEgMTIuMjIgMy4zMUMxMi42NiA0LjQxIDEyLjM4IDUuMjMgMTIuMyA1LjQzQzEyLjgxIDUuOTkgMTMuMTIgNi43IDEzLjEyIDcuNThDMTMuMTIgMTAuNjUgMTEuMjUgMTEuMzMgOS40NyAxMS41M0M5Ljc2IDExLjc4IDEwLjAxIDEyLjI2IDEwLjAxIDEzLjAxQzEwLjAxIDE0LjA4IDEwIDE0Ljk0IDEwIDE1LjIxQzEwIDE1LjQyIDEwLjE1IDE1LjY3IDEwLjU1IDE1LjU5QzEzLjcxIDE0LjUzIDE2IDExLjUzIDE2IDhDMTYgMy41OCAxMi40MiAwIDggMFoiIHRyYW5zZm9ybT0ic2NhbGUoNjQpIiBmaWxsPSIjMUIxRjIzIi8+Cjwvc3ZnPgo=');
            background-size: contain;
            display: block;
        }
        .form-background {
            background-color: #f8f8fb;
        }
        .custom-file-input:lang(ru)~.custom-file-label::after {
            content: 'Выбрать';
        }
        .instruction-list li {
            margin: 0.5rem 0;
        }
        .instruction-list > li {
            margin: 1.25rem 0;
        }
        .footer {
            background-color: #f5f5f5;
        }
        .footer a {
            text-decoration: none;
        }
        .footer a:hover,
        .footer a:hover > span {
            transition: all 0.25s ease;
        }
        .footer a:hover,
        .footer a:hover > span {
            color: #e83e8c !important;
        }
        .footer .developer {
            width: -webkit-max-content;
            width: -moz-max-content;
            width: max-content;
            padding: .5rem .75rem;
            color: #fff;
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            color: #CCC;
            border: 1px solid #CCC;
            border-radius: .5rem;
            text-decoration: none;
            transition: .3s;
        }
        .footer .developer:hover {
            color: #babbfd !important;
            border-color: #babbfd;
        }
        .footer .developer:before {
            content: "\420\430\437\440\430\431\43E\442\43A\430   \441\430\439\442\430";
            font-size: .875rem;
        }
        .footer .developer:after {
            content: "";
            width: 1rem;
            height: 1rem;
            margin-left: .5rem;
            display: inline-flex;
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MC43MyA1MC43MyI+PHBhdGggZmlsbD0iI2JhYmJmZCIgZD0iTTQzLjM0IDQzLjM0YTI0LjQ0IDI0LjQ0IDAgMDEtMTggNy4zOSAyNC40NyAyNC40NyAwIDAxLTE4LTcuMzlBMjQuNDQgMjQuNDQgMCAwMTAgMjUuMzdhMjQuNDcgMjQuNDcgMCAwMTcuMzktMThBMjQuNDcgMjQuNDcgMCAwMTI1LjM3IDBhMjQuNDQgMjQuNDQgMCAwMTE4IDcuMzkgMjQuNDcgMjQuNDcgMCAwMTcuMzkgMTggMjQuNDQgMjQuNDQgMCAwMS03LjQyIDE3Ljk1eiIvPjxwYXRoIGZpbGw9IiMwMGYiIGQ9Ik0zNS4yMiAzNS4yMWExMy40MiAxMy40MiAwIDAxLTkuODUgNCAxMy40IDEzLjQgMCAwMS05Ljg1LTQgMTMuMzggMTMuMzggMCAwMS00LTkuODQgMTMuNCAxMy40IDAgMDE0LTkuODUgMTMuNCAxMy40IDAgMDE5Ljg1LTQgMTMuODEgMTMuODEgMCAwMTEzLjg5IDEzLjkgMTMuNDEgMTMuNDEgMCAwMS00LjA0IDkuNzl6Ii8+PC9zdmc+") 50%/contain no-repeat;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <main role="main" class="flex-shrink-0 mb-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="display-4 mb-5 d-flex flex-column flex-md-row align-items-center">
                        <div class="opera me-4"></div>
                        <?= $title ?>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 mb-4">
                    <div class="alert alert-warning alert-dismissible fade show d-none" role="alert" id="windows">
                        Инструкция для пользователей <b>Windows</b>. Как в других системах — я не знаю. 🤷‍♂️
                    </div>
                </div>
                <?php if ($error = session_flash('error')): ?>
                <div class="col-md-12 mb-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <ol class="instruction-list">
                        <li>
                            Откройте папку<b>*</b> <code>%AppData%\..\Roaming\Opera Software\Opera Stable</code>
                            <ul>
                                <li>В конце <code>Opera Stable</code> или <code>Opera GX Stable</code></li>
                            </ul>
                        </li>
                        <li>
                            Найдите и загрузите в эту форму следующие файлы:
                            <ul>
                                <li><code>Secure Preferences</code></li>
                                <li><code>Secure Preferences.backup</code></li>
                            </ul>
                        </li>
                        <li>Скачайте архив с отредактированными файлами</li>
                        <li>Замените файлы в папке на файлы из архива</li>
                        <li>Установите файлам режим только для чтения</li>
                        <li>В настройках браузера включите VPN<br><code>opera://settings/?search=VPN</code></li>
                    </ol>
                    <br>
                    <p>
                        <b>*</b> — <code>C:\Users\&lsaquo;USER&rsaquo;\AppData\Roaming\Opera Software\&lsaquo;BROWSER&rsaquo;</code>
                    </p>
                </div>
                <div class="col-md-5 offset-md-1">
                    <form action="<?= action() ?>" method="POST" enctype="multipart/form-data" class="p-4 form-background rounded">
                        <input name="files[]" type="file" id="files" multiple class="form-control">
                        <div id="filesInvalidFeedback" class="invalid-feedback"></div>
                        <!-- <div class="custom-file">
                            <input type="file" name="files[]" class="custom-file-input" id="files" multiple>
                            <label class="custom-file-label" for="files">Загрузите файлы...</label>
                            <div id="filesInvalidFeedback" class="invalid-feedback"></div>
                        </div> -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success" id="submitFiles" disabled>Загрузить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="https://github.com/webdevrus/opera-vpn-back" target="_blank" class="d-flex align-items-center">
                    <div class="github me-2"></div>
                    <span class="text-muted">GitHub</span>
                </a>
                <a href="https://xn----8sbabdbvtlu6btc5a9e.xn--p1ai/" target="_blank" class="developer"></a>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">⚠ Внимание</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Как выяснилось, данный способ может работать не у всех.</p>
                <p>Я взял инструкцию из открытых источников и сделал под неё сервис для удобства.</p>
                <p>Если у вас не заработало, пожалуйста, ищите альтернативные варианты.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agree">Ясно, понятно!</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        let message = document.getElementById('windows');
        let isWin = /win/.test(window.navigator.platform.toLocaleLowerCase());
        if (!isWin) {
            message.classList.remove('d-none');
        }

        let modal = new bootstrap.Modal(document.getElementById('info'));
        let agree = document.getElementById('agree');
        let isAgree = JSON.parse(localStorage.getItem('agree'));

        if (!isAgree) {
            modal.show();
            agree.addEventListener('click', () => {
                localStorage.setItem('agree', true);
                modal.hide();
            });
        }
    </script>
    <script>
        document.getElementById('files').addEventListener('change', function (e) {
            let input = e.target;
            let error = document.getElementById('filesInvalidFeedback');
            let files = e.target.files;
            let button = document.getElementById('submitFiles');
            let validate = (files) => {
                let data = <?= json_encode($valid) ?>;
                for (let file of files) {
                    console.info(
                        file.name,
                        data
                    );
                    if (!data.includes(file.name)) {
                        return false;
                    }
                }
                return true;
            };

            input.classList.remove('is-invalid');
            error.innerText = '';

            try {
                if (files.length !== 2 || !validate(files)) {
                    throw new Error('Выберите файлы, указанные в описании');
                }
                button.removeAttribute('disabled');
            } catch (exception) {
                input.classList.add('is-invalid');
                error.innerText = exception.message;
                button.setAttribute('disabled', true);
            }

        });
    </script>
    <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(81732412, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, trackHash:true }); </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/81732412" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</body>
</html>