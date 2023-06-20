<?php

namespace Models;

class HomeModel
{
    public static function imprimirCards()
    {
        $cards = \MySql::conectar()->prepare('SELECT * FROM `tb_produtos`');
        $cards->execute();
        $cards = $cards->fetchAll();

        foreach ($cards as $key => $value) {
            $produto = str_replace(' ', '_', $value['nome']);
            echo '
            <div class="product" id="'.$produto.'_'.$value['id'].'_card">
            <i class="fa-solid fa-circle-info"></i>
            <div class="img_product_father">
                <img src="'.INCLUDE_PATH.'Models/post_receivers/uploads/'.$value['img'].'" width=" 150px">
            </div>
            <div class="product_data">
                <div class="flex_column">
                    <div class="first_line">
                        <span class="price">R$: <label id="'.$produto.'_'.$value['id'].'_price" price ="'.$value['preco'].'">'.$value['preco'].'</label>,00</span>
                        <span id="'.$produto.'_'.$value['id'].'_peso" peso ="'.$value['peso'].'" class="weight">'.$value['peso'].'g</span>
                    </div>
                    <div class="second_line">
                        <span id="'.$produto.'_'.$value['id'].'_name" class="name">'.$value['nome'].'</span>
                        <div class="flex">
                        <div class="minus  plus_minus" produto="'.$produto.'_'.$value['id'].'">
                                <i class="fa-solid fa-minus"></i>

                            </div>
                          
                            <span id="'.$produto.'_'.$value['id'].'_quantidade">
                                0
                            </span>
                            <div class="plus plus_minus" produto="'.$produto.'_'.$value['id'].'">
                                <i class="fa-solid fa-plus"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                ';
        }
    }
}
