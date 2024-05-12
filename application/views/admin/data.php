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
                                    <th>Location Name</th>
                                    <th>Location Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Drama Title</th>
                                    <th>Location Name</th>
                                    <th>Location Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($location as $l) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $l['drama_title']; ?></td>
                                        <td><?= $l['location_name']; ?></td>
                                        <td><?= $l['location_address']; ?></td>
                                        <td><?= $l['latitude']; ?></td>
                                        <td><?= $l['longitude']; ?></td>
                                        <td><img src="<?= base_url('assets/images/' . $l['image']); ?>" alt="" width="100px"></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit/' . $l['id']); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/delete/' . $l['id']); ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>