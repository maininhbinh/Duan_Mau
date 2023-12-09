<?php
$comment = $data['comment'];
unset($_SESSION['focus']);
$_SESSION['focus']['comment'] = true;
include(APP_DIR . '/resources/views/layouts/admin/header.php')
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div>
        <div class="flex items-center justify-between">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Collapsible Table
            </h2>
            <div class="flex">
                <div class="flex items-center" x-data="{isInputActive:false}">
                    <label class="block">
                        <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});" :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'" class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200" placeholder="Search here..." type="text" />
                    </label>
                    <button @click="isInputActive = !isInputActive" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['message']['success'])) { ?>
            <div class="alert flex rounded-lg border border-success/30 bg-success/10 py-4 px-4 text-success sm:px-5">
                <?= $_SESSION['message']['success']  ?>
            </div>
        <?php
            unset($_SESSION['message']);
        } ?>
        <div class="card mt-3">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Tên người dùng
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Tên sản phẩm
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Loại bình luận
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                date
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Bình luận
                            </th>
                            <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <?php foreach ($comment as $key => $item) { ?>
                        <tbody x-data="{expanded:false}">
                            <tr class="border-y border-transparent">
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5"><?= ++$key ?></td>
                                <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                    <?= $item['nameUser'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= $item['nameProduct'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= !empty($item['id_role']) ? 'reply' : 'main' ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div class="flex space-x-2">
                                        <div class="badge rounded-full border border-info text-info">
                                            <?= $item['date'] ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <button @click="expanded = !expanded" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <i :class="expanded && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                                    </button>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <a href="<?= APP_URL ?>/admin/comment/<?= $item['id'] ?>/delete" class="badge space-x-2 bg-error text-white" onclick=" return confirm('bạn có chắc muốn xóa bình luận này không?')">
                                        <span>Remove</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                <td colspan="100" class="p-0">
                                    <div x-show="expanded" x-collapse class="text-center">
                                        <table class="w-full text-center">
                                            <thead>
                                                <tr>
                                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                        Nội dung
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                        <?= $item['comment'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>

            <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                <div class="text-xs+"><?= $_SESSION['page'] ?> - <?= $data['maxPage'] ?> of <?= $data['maxPage'] ?> entries</div>
                <ol class="pagination">
                    <li class="rounded-l-full bg-slate-150 dark:bg-navy-500">
                        <a href="?page=<?= $_SESSION['page'] - 1 == 0 ? $_SESSION['page'] : $pre = $_SESSION['page'] - 1  ?>" class=" flex h-8 w-8 items-center justify-center rounded-full text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $data['maxPage']; $i++) { ?>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="?page=<?= $i ?>" class="<?= isset($_SESSION['page']) && $_SESSION['page'] == $i ? 'flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' : 'flex h-8 min-w-[2rem] items-center justify-center rounded-full px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' ?>"><?= $i ?></a>
                        </li>
                    <?php } ?>
                    <li class="rounded-r-full bg-slate-150 dark:bg-navy-500">
                        <a href="?page=<?= $_SESSION['page'] + 1 > $data['maxPage'] ? $_SESSION['page'] : $next = $_SESSION['page'] + 1  ?>" class="flex h-8 w-8 items-center justify-center rounded-full text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</main>
<?php include(APP_DIR . '/resources/views/layouts/admin/footer.php') ?>