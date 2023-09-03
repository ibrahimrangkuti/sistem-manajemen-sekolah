<!-- Modal Absensi -->
<div class="modal fade" id="presenceModal" tabindex="-1" aria-labelledby="presenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="presenceModalLabel">Absensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div id="camera"></div>
                    <a href="javascript:void(take_photo())" class="btn btn-primary w-100">Ambil Foto</a>
                    <div id="preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Webcam.set({
            width: '100%',
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        })

        Webcam.attach('#camera')

        function takePhoto() {
            Webcam.snap(function(data_uri)) {
                document.getElementById('preview').innerHTML = '<img src="' + data_uri + '"/>';
            }
        }
    </script>
@endpush
