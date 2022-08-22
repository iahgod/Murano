
//!Tabela 

<?=$render('components/tabela', 
['titulos'=>[
    'Nome', 'E-Mail', 'Grupo', 'Criado em'
],
'names'=>[
    'nome'      => ['nome',      'text'],
    'email'     => ['email',     'text'],
    'descricao' => ['descricao', 'text'],
    'criado_em' => ['criado_em', 'data'],
],
'dados'=>$usuarios, 'pagina'=>'usuarios', 'btnStatus'=>false, 'btnEditar'=>true, 'deleteP'=>'']);?>
