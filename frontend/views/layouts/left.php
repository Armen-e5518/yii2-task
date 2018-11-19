<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidbar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Products', 'icon' => 'file-code-o', 'url' => ['/products']],
                    ['label' => 'Categories', 'icon' => 'file-code-o', 'url' => ['/categories']],
                    ['label' => 'Sub Categories', 'icon' => 'file-code-o', 'url' => ['/sub-categories']],
                    ['label' => 'Sub Sub Categories', 'icon' => 'file-code-o', 'url' => ['/sub-sub-categories']],
                ],
            ]
        ) ?>

    </section>

</aside>
