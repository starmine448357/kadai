<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-container"> 
    <h1 class="contact-title">Contact</h1> 

    <form action="<?php echo e(route('contact.confirm')); ?>" method="POST"> 
        <?php echo csrf_field(); ?>

        <div class="form-grid-container"> 

            
            <div class="form-group">
                <div class="label-column"> 
                    <label class="form-label">お名前<span class="required-mark">※</span></label> 
                </div>
                <div class="input-column"> 
                    <div class="name-fields">
                        <div class="name-field-item"> 
                            <div class="field-wrapper"> 
                                <input type="text" name="last_names" class="form-input" placeholder="例：山田" value="<?php echo e(old('last_names')); ?>"> 
                                <?php $__errorArgs = ['last_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                            </div>
                        </div>
                        <div class="name-field-item">
                            <div class="field-wrapper">
                                <input type="text" name="first_names" class="form-input" placeholder="例：太郎" value="<?php echo e(old('first_names')); ?>">
                                <?php $__errorArgs = ['first_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">性別<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="gender-options">
                        <label class="gender-option"><input type="radio" name="genders" value="1" <?php echo e(old('genders', '1') == '1' ? 'checked' : ''); ?>> 男性</label> 
                        <label class="gender-option"><input type="radio" name="genders" value="2" <?php echo e(old('genders') == '2' ? 'checked' : ''); ?>> 女性</label>
                        <label class="gender-option"><input type="radio" name="genders" value="3" <?php echo e(old('genders') == '3' ? 'checked' : ''); ?>> その他</label>
                    </div>
                    <?php $__errorArgs = ['genders'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">メールアドレス<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="field-wrapper">
                        <input type="email" name="emails" class="form-input" placeholder="例：test@example.com" value="<?php echo e(old('emails')); ?>">
                        <?php $__errorArgs = ['emails'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">電話番号<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="tel-fields">
                        <div class="tel-part"> 
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts1" class="form-input" placeholder="080" value="<?php echo e(old('tel_parts1')); ?>"> 
                                <?php $__errorArgs = ['tel_parts1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <span>-</span>
                        <div class="tel-part">
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts2" class="form-input" placeholder="1234" value="<?php echo e(old('tel_parts2')); ?>"> 
                                <?php $__errorArgs = ['tel_parts2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <span>-</span>
                        <div class="tel-part">
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts3" class="form-input" placeholder="5678" value="<?php echo e(old('tel_parts3')); ?>"> 
                                <?php $__errorArgs = ['tel_parts3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['tels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">住所<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="field-wrapper">
                        <input type="text" name="addresses" class="form-input" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="<?php echo e(old('addresses')); ?>">
                        <?php $__errorArgs = ['addresses'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">建物名</label>
                </div>
                <div class="input-column">
                    <div class="field-wrapper">
                        <input type="text" name="buildings" class="form-input" placeholder="例：千駄ヶ谷マンション101" value="<?php echo e(old('buildings')); ?>">
                        <?php $__errorArgs = ['buildings'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">お問い合わせの種類<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="field-wrapper">
                        <select name="category_ids" class="form-select"> 
                            <option value="">選択してください</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_ids') == $category->id ? 'selected' : ''); ?>> 
                                    <?php echo e($category->contents); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['category_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <div class="label-column">
                    <label class="form-label">お問い合わせ内容<span class="required-mark">※</span></label>
                </div>
                <div class="input-column">
                    <div class="field-wrapper">
                        <textarea name="details" class="form-textarea" placeholder="お問い合わせ内容をご記載ください"><?php echo e(old('details')); ?></textarea> 
                        <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

        </div> 

        <div class="text-center"> 
            <button type="submit" class="submit-button">確認画面</button> 
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/contact/index.blade.php ENDPATH**/ ?>