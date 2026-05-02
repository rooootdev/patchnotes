<?php include 'api.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>patchnotes_</title>
        <style>
            body {
                margin: 0;
                background: #111;
                color: #eee;
                font-family: monospace;
                line-height: 1.5;
                padding: 10px;
            }

            .wrap {
                max-width: 800px;
                margin: 40px auto;
                padding: 20px;
                text-align: left;
            }

            a {
                color: #6aa9ff;
                text-decoration: none;
                word-break: break-all;
            }

            a:hover {
                text-decoration: underline;
            }

            .row {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                padding: 6px 0;
                border-bottom: 1px solid #222;
                align-items: baseline;
            }

            .version {
                white-space: nowrap;
                flex-shrink: 0;
            }

            .link {
                flex: 1;
                text-align: right;
                word-break: break-word;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <div style="display: flex; align-items: center; margin-bottom: 2px;">
                <h1 style="margin: 0; line-height: 1;">patchnotes:</h1>
                <div style="flex: 1;"></div>
                <a href="https://github.com/rooootdev/patchnotes" target="_blank" style="display: flex; align-items: center; text-decoration: none;">
                    <svg height="25" width="25" viewBox="0 0 16 16"
                        fill="#eee" style="display: block;">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94 -.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52 -.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07 -1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27 .68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12 .51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95 .29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8 c0-4.42-3.58-8-8-8z"/>
                    </svg>
                </a>
            </div>

            <?php foreach ($results as $item): ?>
                <div class="row">
                    <div class="version">
                        iOS/iPadOS <b><?= htmlspecialchars($item['ios']) ?></b>
                    </div>
                    <a class="link" target="_blank" href="<?= htmlspecialchars($item['link']) ?>">
                        <?= htmlspecialchars($item['link']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
