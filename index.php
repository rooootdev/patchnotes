<?php include 'api.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>securitycontent_</title>
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
            <h1 style="margin-bottom: 1px;">security content:</h1>

            <?php foreach ($results as $item): ?>
                <div class="row">
                    <div class="version">
                        iOS/iPadOS <b><?= htmlspecialchars($item['ios']) ?></b>
                    </div>
                    <a class="link" href="<?= htmlspecialchars($item['link']) ?>">
                        <?= htmlspecialchars($item['link']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
