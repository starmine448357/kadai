<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - 確認</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/confirm.css')); ?>">

</head>
<body>
    <header>
        <div class="header-content-wrapper">
            <h1 class="header-title">FashionablyLate</h1>
            <nav class="header-nav">
            </nav>
        </div>
    </header>

    <main>
        <div class="confirm-container">
            <h1 class="confirm-title">Confirm</h1>
            <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <table class="confirm-table">
                    <tr>
                        <th>お名前</th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['last_names']); ?> <?php echo e($contact['first_names']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <div class="form-input-display">
                                <?php if($contact['genders'] == 1): ?> 男性
                                <?php elseif($contact['genders'] == 2): ?> 女性
                                <?php else: ?> その他
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['emails']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['tels']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['addresses']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['buildings']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['category_name']); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div class="form-input-display"><?php echo e($contact['details']); ?></div>
                        </td>
                    </tr>
                </table>

                
                <input type="hidden" name="last_names" value="<?php echo e($contact['last_names']); ?>">
                <input type="hidden" name="first_names" value="<?php echo e($contact['first_names']); ?>">
                <input type="hidden" name="genders" value="<?php echo e($contact['genders']); ?>">
                <input type="hidden" name="emails" value="<?php echo e($contact['emails']); ?>">
                <input type="hidden" name="tels" value="<?php echo e($contact['tels']); ?>">
                <input type="hidden" name="addresses" value="<?php echo e($contact['addresses']); ?>">
                <input type="hidden" name="buildings" value="<?php echo e($contact['buildings']); ?>">
                <input type="hidden" name="category_id" value="<?php echo e($contact['category_id']); ?>">
                <input type="hidden" name="details" value="<?php echo e($contact['details']); ?>">

                <div class="confirm-buttons-horizontal">
                    <button type="submit" class="confirm-button submit-button">送信</button>
                    <button type="button" class="confirm-button back-button" onclick="history.back()">修正</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html><?php /**PATH /var/www/html/resources/views/contact/confirm.blade.php ENDPATH**/ ?>