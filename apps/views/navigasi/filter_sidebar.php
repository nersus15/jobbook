<style>
    .sidebar-wrapper {
        top: 25%;
        margin-left: 3%;
        width: 20%;
        position: fixed;
        height: 100%;
        left: 0;
    }
</style>
<div class="sidebar-wrapper">
    <h4 style="color: grey">Filter Pekerjaan</h4>
    <form action="">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="custom-select form-control" name="kategor" id="kategori">
                <option value="">kategori1</option>
                <option value="">kategori2</option>
                <option value="">kategori3</option>
                <option value="">kategori4</option>
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select form-control" name="" id=""></select>
        </div>
        <div class="form-group">
            <label for="formControlRange">Bayaran Pekerjaan</label>
            <input min="0" value="500000" oninput="nilai(value)" max="1000000" type="range" class="form-control-range" id="formControlRange">
            <output for="vol" id="volume">Rp.500000</output>
        </div>
        <script>
            function nilai(vol) {
                document.querySelector('#volume').value = "Rp." + vol;
            }
        </script>
    </form>



</div>