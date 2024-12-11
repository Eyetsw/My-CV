<div class="modal fade" id="deleteMember" tabindex="-1" aria-labelledby="deleteMemberModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteMemberModal">ลบ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="deleteMemberForm">
          <div class="mb-3">
            <label for="deleteUsername" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="deleteUsername" name="username" required>
          </div>
          <div class="mb-3">
            <label for="deletePassword" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="deletePassword" name="password" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" id="saveChanges">บันทึก</button>
      </div>
    </div>
  </div>
</div>