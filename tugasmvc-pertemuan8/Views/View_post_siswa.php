<?php
// Memanggil fungsi dari CSRF
include('../Config/Csrf.php');

include '../Controllers/Controller_siswa.php';
// Membuat Object dari Class siswa
$siswa = new Controller_siswa();
$GetKelas = $siswa->GetData_Kelas();
?>
<form action="../Config/Routes.php?function=create_siswa" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
    <table border="1">
        <tr>
            <td>NISN</td>
            <td><input type="text" name="nisn" onKeyPress="return  isNumberKey(event);" required></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td><input type="text" name="nis" onKeyPress="return  isNumberKey(event);" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" onKeyPress="return ValidateAlpha(event);" required></td>
        </tr>
        <tr>
            <td>Kelas</td>


            <td>
                <select name="id_kelas" required>
                    <option value="">Pilih Kelas</option>
                    <?php
                    foreach ($GetKelas as $Get) : ?>
                        <option value="<?php echo $Get['id_kelas'] ?>"><?php echo $Get['nama_kelas'] ?></option>

                    <?php endforeach; ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><input type="text" name="no_telp" onKeyPress="return isNumberKey(event);" required></td>
        <tr>
            <td>Nominal SPP</td>


            <td>
                <select name="id_spp" required>

                    <option value="">Pilih Nominal SPP</option>
                    <option value="1">30000</option>
                    <option value="2">25000</option>
                    <option value="3">20000</option>
                    <option value="4">15000</option>
                </select>

            </td>

        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
        </tr>
    </table>
</form>

<script>
    function ValidateAlpha(evt) {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;
    }

    function isNumberKey(evt) {
        //var e = evt || window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>