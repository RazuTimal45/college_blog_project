<script>
function setupImagePreview(inputId, previewId, updateId) {
        document.getElementById(inputId).addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';

                if (updateId) {
                    var updateElement = document.getElementById(updateId);
                    if (updateElement) {
                        updateElement.style.display = 'none';
                    }
                }
            }

            reader.readAsDataURL(this.files[0]);
        });
    }
    </script>