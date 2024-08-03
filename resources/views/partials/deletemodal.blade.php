<script>
    // เมื่อเอกสารโหลดเสร็จแล้ว
    document.addEventListener('DOMContentLoaded', function() {
        // เลือกปุ่มที่มี attribute data-modal-target="popup-modal"
        const modalButtons = document.querySelectorAll('button[data-modal-target="popup-modal"]');

        // วนลูปเพื่อให้ทุกปุ่มสามารถทำงานได้
        modalButtons.forEach(button => {
            button.addEventListener('click', function() {
                // ดึงค่า data-id จากปุ่มที่ถูกคลิก
                const termId = this.dataset.id;

                // อ้างอิงไปยัง element ที่จะแสดงค่า termId
                const modalTermId = document.getElementById('modal-term-id');

                // แสดงค่า termId ในโมดัล
                modalTermId.textContent = termId;

                // อัปเดต action attribute ของ form ด้วย route ที่มีค่า term_id เป็น parameter
                const deleteForm = document.getElementById('delete-form');
                deleteForm.action =
                    `{{ route('terminal.destroy', ['terminal' => ':term_id']) }}`.replace(
                        ':term_id', termId);

                // เปิดโมดัล
                const modalElement = document.getElementById('popup-modal');
                modalElement.classList.remove('hidden');
            });
        });

        // ปิดโมดัลเมื่อคลิกปุ่มปิด
        const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modalElement = document.getElementById('popup-modal');
                modalElement.classList.add('hidden');
            });
        });
    });
</script>
