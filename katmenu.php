<?php
include "proses/connect.php";
$query = mysqli_query($conn, 'SELECT * FROM tb_kategori_menu');
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-3">
    <div class="card">
        <div class="card-header">
            Kategori Menu
        </div>
        <div class="card-body">
            <div class='row'>
                <div class='col d-flex justify-content-end'>
                    <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#ModalTambahKategori"> Tambah
                        Kategori Menu</button>
                </div>
            </div>
            <!-- Modal [Tambah Kategori Baru] -->
            <div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_kategori_menu.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="jenismenu" id="">
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                            </select>
                                            <label for="floatingInput"> Jenis Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Menu!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Kategori Menu" name="katmenu" required>
                                            <label for="floatingInput"> Kategori Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Menu!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_kategori_menu_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal [Tambah Kategori Baru] -->
            <?php
            foreach ($result as $row) {
                ?>

                <!-- Modal [Edit Kategori] -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_kategori_menu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_kategori_menu.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id_kategori_menu'] ?>" name='id'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required
                                                    name="jenismenu" id="">
                                                    <?php
                                                    $data = array("Makanan", "Minuman");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['jenis_menu'] == $key + 1) {
                                                            echo "<option selected value='$key'>$value</option>";
                                                        } else {
                                                            echo "<option value='$key'>$value</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput"> Jenis Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jenis Menu!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Kategori Menu" name="katmenu" required
                                                    value="<?php echo $row['kategori_menu'] ?>">
                                                <label for="floatingInput"> Kategori Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kategori Menu!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="edit_kategori_menu_validate"
                                            value="12345">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal [Edit Kategori] -->

                <!-- Modal [Delete Kategori] -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_kategori_menu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Hapus Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_kategori_menu.php"
                                    method="POST">
                                    <input type="" value="<?php echo $row['id_kategori_menu'] ?>" name="id">
                                    <div class="col-lg-12">
                                        Apakah Anda Ingin Menghapus Kategori <b>
                                            <?php echo $row['kategori_menu'] ?>
                                        </b>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_kategori_validate"
                                            value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal [Delete Kategori] -->

                <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
                ?>
                <!-- Tabel Kategori Menu -->
                <div class='table-responsive'>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_menu'] ?>
                                    </td>
                                    <td class='d-flex'>
                                        <button class='btn btn-warning btn-sm me-1' data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['id_kategori_menu'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class='btn btn-danger btn-sm me-1' data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_kategori_menu'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Tabel Kategori Menu -->
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>