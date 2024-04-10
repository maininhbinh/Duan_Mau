<?php

namespace App\Controllers;

use App\Models\HomeModel;
use DateTime;
use Modules\core;

class HomeController
{
    public $home;

    public function __construct()
    {
        $this->home = new HomeModel();
    }

    public function index()
    {
        $products = $this->home->getNewProduct();
        $category = $this->home->getAllCategoryParent();
        $viewMost = $this->home->viewMost();
        $user = $this->home->getAllUser();
        return view('pages.client.home', compact('category', 'user', 'products', 'viewMost'));
    }

    public function detailProduct($id)
    {
        $comments = $this->home->getCommentByProduct($id);


        foreach ($comments as $key => $comment) {
            $commentTime = $comment['date'];
            
            $currentDateTime = new DateTime();

            $commentDateTime = new DateTime($commentTime);


            $interval = $currentDateTime->diff($commentDateTime);

            $date = [
                'years' => $interval->y,
                'months' => $interval->m,
                'days' => $interval->d,
                'hours' => $interval->h,
                'minutes' => $interval->i,
                'seconds' => $interval->s
            ];

            foreach ($date as $i => $value) {
                if ($value > 0) {
                    $comments[$key]['date'] = $value . ' ' . $i;
                    break;
                }
            }
        }

        $count = count($comments);
        $commentSave = $comments;

        for ($i = 0; $i < count($comments); $i++) {
            for ($j = 0; $j < count($comments); $j++) {
                if ($comments[$j]['id_reply'] == $comments[$i]['id']) {
                    $reply[] = $comments[$j];
                    unset($commentSave[$j]);
                    $commentSave[$i]['data'] = $reply;
                }
            }
        }

        $comments = $commentSave;


        $product = $this->home->getOneProduct($id);
        $productSame = $this->home->getProductSame($id, $product['id_category']);
        return view('pages.client.detail-product', compact('product', 'productSame', 'comments'));
    }

    public function shop()
    {
        $item = [];
        $order = '';
        $checkFilter = false;

        if (isset($_GET['clear'])) {
            unset($_GET['item']);
        }

        if (isset($_GET['item'])) {
            $item = $_GET['item'];
            $products = $this->home->filterCategory($item);
            $checkFilter = true;
        }

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
            if ($order == 'desc') {
                $products = $this->home->filterSortDesc();
            }
            if ($order == 'asc') {
                $products = $this->home->filterSortAsc();
            }

            $checkFilter = true;
        }

        if (!$checkFilter) {
            $products = $this->home->getALLProduct();
            unset($_SESSION['btn']);
        } else {
            $_SESSION['btn']['clear'] = true;
        }

        $category = $this->home->getAllCategory();
        return view('pages.client.shop', compact('products', 'category', 'item', 'order'));
    }

    public function setView($id)
    {
        $this->home->setView($id);
    }

    public function filterCategory($id)
    {
        $item = [];
        $order = '';
        $checkFilter = false;
        $products = $this->home->getAllProductByIdParent($id);

        if (isset($_GET['clear'])) {
            unset($_GET);
        }

        if (isset($_GET['item'])) {
            $item = $_GET['item'];
            $products = $this->home->filterCategory($item);
            $checkFilter = true;
        }

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
            if ($order == 'desc') {
                $products = $this->home->filterSortDescByIdParent($id);
            }
            if ($order == 'asc') {
                $products = $this->home->filterSortAscByIdParent($id);
            }

            $checkFilter = true;
        }

        if (!$checkFilter) {
            unset($_SESSION['btn']);
        } else {
            $_SESSION['btn']['clear'] = true;
        }

        $category = $this->home->getAllCategoryByIdParent($id);
        return view('pages.client.shop', compact('products', 'category', 'item', 'order'));
    }

    public function filterSearch()
    {
        $check = false;
        $search = true;
        if (isset($_GET['keywork'])) {
            $check = true;
        }
        if (!empty(trim($_GET['keywork']))) {
            $check = true;
        }

        if ($check) {
            $keywork = $_GET['keywork'];
            $products = $this->home->filterName($keywork);
            $category = $this->home->getAllCategory();
            return view('pages.client.shop', compact('products', 'search', 'keywork'));
        }
    }

    public function postComment($idProduct, $idUser)
    {
        $check = true;
        $comment = htmlspecialchars(strip_tags(trim($_POST['comment'] ?? '')));
        $date = date('Y-m-d H:i:s');
        if ($check) {
            $this->home->postComment($comment, $idProduct, $idUser, $date);
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function replyComment($idProduct, $idUser, $idReply)
    {
        $check = true;
        $comment = htmlspecialchars(strip_tags(trim($_POST['comment'] ?? '')));
        $date = date('Y-m-d H:i:s');

        if (strlen($comment) < 10) {
            $check = false;
        }

        if ($check) {
            $this->home->replyComment($comment, $idProduct, $idUser, $idReply, $date);
        }

        return;
    }

    public function deleteComment($id)
    {
        $this->home->deleteComment($id);
    }
}
