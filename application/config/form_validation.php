<?php
/**
 * Set de regras de validação
 */

    $config = array(
        'noticia' => array(
            array(
                'field' => 'titulo',
                'label' => 'Título da notícia',
                'rules' => 'trim|required|min_length[5]'
            ),
            array(
                'field' => 'descricao',
                'label' => 'Descrição da notícia',
                'rules' => 'trim|required|min_length[50]'
            )
        )
    );

?>