<?php

use Modules\Stogare;

$category = $data['category'];
if (isset($data['product'])) {
    $product = $data['product'];
}
include(APP_DIR . '/resources/views/layouts/admin/header.php'); ?>
<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Form Layout 2
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li>Form Layout 2</li>
        </ul>
    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 grid lg:col-span-4 lg:place-items-center">
            <div>
                <ol class="steps is-vertical line-space [--size:2.75rem] [--line:.5rem]">
                    <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                        <div class="step-header mask is-hexagon
                        <?php if (isset($_SESSION['message']['success'])) { ?>
                            bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100
                        <?php } else { ?>
                            bg-primary text-white dark:bg-accent
                        <?php } ?>
                        ">
                            <i class="fa-solid fa-layer-group text-base"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                Step 1
                            </p>
                            <h3 class="text-base font-medium 
                            <?php if (!isset($_SESSION['message']['success'])) { ?>
                                text-primary dark:text-accent-light
                            <?php } ?>
                            ">
                                General
                            </h3>
                        </div>
                    </li>
                    <li class="step space-x-4 before:bg-slate-200 dark:before:bg-navy-500">
                        <div class="step-header mask is-hexagon 
                        <?php if (!isset($_SESSION['message']['success'])) { ?>
                            bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100
                        <?php } else { ?>
                            bg-primary text-white dark:bg-accent
                        <?php } ?>
                        ">
                            <i class="fa-solid fa-check text-base"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                Step 2
                            </p>
                            <h3 class="text-base font-medium
                            <?php if (isset($_SESSION['message']['success'])) { ?>
                                text-primary dark:text-accent-light
                            <?php } ?>
                            ">Confirm</h3>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-span-12 grid lg:col-span-8">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            General
                        </h4>
                    </div>
                </div>
                <form action="<?= APP_URL ?>/admin/product/add" method="post" enctype="multipart/form-data" class="space-y-4 p-4 sm:p-5">
                    <?php
                    if (isset($_SESSION['message']['error'])) { ?>
                        <div class="alert rounded-lg border border-error px-4 py-4 text-error">
                            <?php foreach ($_SESSION['message']['error'] as $message) { ?>
                                <div class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <p> <?= $message ?> </p>
                                </div>
                            <?php } ?>
                        </div>

                    <?php
                        unset($_SESSION['message']);
                    } else if (isset($_SESSION['message']['success'])) { ?>
                        <div class="alert flex rounded-lg border border-success/30 bg-success/10 py-4 px-4 text-success sm:px-5">
                            <?= $_SESSION['message']['success']  ?>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    } ?>
                    <label class="block">
                        <span>Product name</span>

                        <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập tên sản phẩm" name="name" type="text" />
                    </label>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span>Danh mục</span>
                            <select name="id_category" class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})">
                                <option value="">---Chọn---</option>
                                <?php foreach ($category as $key => $item) { ?>
                                    <option value="<?= $key ?>"><?= $item ?></option>
                                <?php } ?>
                            </select>
                        </label>

                        <div class="grid grid-cols-2 gap-4">
                            <label class="block">
                                <span>Quantity</span>
                                <input name="quantity_stock" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Quantity stock" type="number" min="1" />
                            </label>

                            <label class="block">
                                <span>Price</span>
                                <input name="price" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Price" type="number" min="1" />
                            </label>
                        </div>
                    </div>
                    <div>
                        <span class="font-medium text-slate-600 dark:text-navy-100">Describe</span>
                        <div class="mt-1.5 w-full">
                            <div id="quillEditor" class="h-44"></div>
                            <textarea name="description" id="myTextarea" placeholder="Enter your content..." hidden></textarea>
                        </div>
                    </div>
                    <div>
                        <span>Images</span>
                        <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                            <!-- <label class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <input id="myFileInput" name="imager" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" />
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span>Choose File</span>
                                </div>
                            </label> -->
                            <div class="filepond fp-bordered">
                                <input type="file" name="imager" x-init="FilePond.create($el)" multiple />
                            </div>
                        </div>

                        <div class="flex justify-center space-x-2 pt-4">
                            <button type="submit" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</main>
<script>
    var quillEditor = new Quill('#quillEditor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                    header: 1
                }, {
                    header: 2
                }],
                [{
                    list: 'ordered'
                }, {
                    list: 'bullet'
                }],
                [{
                    script: 'sub'
                }, {
                    script: 'super'
                }],
                [{
                    indent: '-1'
                }, {
                    indent: '+1'
                }],
                [{
                    direction: 'rtl'
                }],
                [{
                    size: ['small', false, 'large', 'huge']
                }],
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    font: []
                }],
                [{
                    align: []
                }],
                ['clean'],
            ],
        },
        placeholder: 'Enter your content...',
        theme: 'snow',
    });

    var myTextarea = document.getElementById('myTextarea');

    quillEditor.on('text-change', function() {
        var htmlContent = quillEditor.root.innerHTML;
        myTextarea.innerHTML = htmlContent;
        myTextarea.value = quillEditor.root.innerHTML;
    });
</script>
<?php include(APP_DIR . '/resources/views/layouts/admin/footer.php') ?>