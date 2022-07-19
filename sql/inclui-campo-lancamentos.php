<?php

if(isset($_GET['despesa'])) {

    if ($_GET['numero'] == '') {

        $_GET['numero'] = 1;
        header('location: despesas_lote.php?numero='.$_GET['numero']);
    } else if($_GET['numero'] >= 10) {
        
        $_GET['numero'] = 'error';
        header('location: despesas_lote.php?numero='.$_GET['numero']);
    } else {

        header('location: despesas_lote.php?numero='.$_GET['numero']);
    }

} else if(isset($_GET['receita'])) {

    if ($_GET['numero'] == '') {

        $_GET['numero'] = 1;
        header('location: despesas_lote.php?numero='.$_GET['numero']);
    } else if($_GET['numero'] >= 10) {
        
        $_GET['numero'] = 'error';
        header('location: despesas_lote.php?numero='.$_GET['numero']);
    } else {

        header('location: despesas_lote.php?numero='.$_GET['numero']);
    }
}







