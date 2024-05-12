<main>
    <div class="container-fluid px-4">
        <h1 class="my-4"><?= $title; ?></h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message');
                        ?>
                        <?php $this->session->unset_userdata('message'); ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Drama Title</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Drama Title</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php
                                $unique_drama_titles = array_unique(array_column($location, 'drama_title'));
                                foreach ($unique_drama_titles as $drama_title) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $drama_title; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>