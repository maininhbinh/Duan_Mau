<?php

use Modules\Stogare;

unset($_SESSION['focus']);
$_SESSION['focus']['user'] = true;
$users = $data['users'];
include(APP_DIR . '/resources/views/layouts/admin/header.php')
?>
<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div>
        <div class="flex items-center justify-between">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Quản lý người dùng
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
                                Name
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Email
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Phone
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Avatar
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Address
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Status
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody x-data="{expanded:false}">
                        <?php foreach ($users as $key => $user) { ?>
                            <tr class="border-y border-transparent">
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= ++$key ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= $user['name'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                    <?= $user['email'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= $user['phone'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div class="avatar flex">
                                        <img class="rounded-full" src="<?= APP_URL ?><?= !empty($user['avatar']) ? Stogare::url($user['avatar']) : 'public/images/avatar/user.png' ?>" alt="avatar" />
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <?= $user['address'] ?>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div class="flex space-x-2">
                                        <?php if ($user['is_delete'] == 1) { ?>
                                            <div class="badge rounded-full border border-warning text-warning">
                                                Bị khóa
                                            </div>
                                        <?php } else { ?>
                                            <div class="badge rounded-full border border-success text-success">
                                                Hoạt động
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <a href="<?= APP_URL ?>admin/<?= $user['id'] ?>/role" class="badge space-x-2 bg-secondary text-white" onclick="return confirm('Bạn có chắc muốn cấp quyền cho người dùng này chứ!')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Cấp Quyền</span>
                                    </a>
                                    <?php if ($user['is_delete'] == 0) { ?>
                                        <a href="<?= APP_URL ?>admin/user/<?= $user['id'] ?>/in_active" class="badge space-x-2 bg-warning text-white shadow-soft shadow-warning/50" onclick="return confirm('Bạn có chắc muốn khóa người dùng này không!')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Chặn</span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= APP_URL ?>admin/user/<?= $user['id'] ?>/active" class="badge space-x-2 bg-warning text-white shadow-soft shadow-warning/50" onclick="return confirm('Bạn có chắc muốn khóa người dùng này không!')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Mở chặn
                                            </span>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
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