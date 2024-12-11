<div class="modal fade" id="editMember" tabindex="-1" aria-labelledby="editMemberModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMemberModal">แก้ไขสมาชิก</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit-member.php">
          <div class="mb-3">
            <label for="oldUsername" class="col-form-label">Username เก่า:</label>
            <input type="text" class="form-control" id="oldUsername" name="old_username" required>
          </div>
          <div class="mb-3">
            <label for="newUsername" class="col-form-label">Username ใหม่:</label>
            <input type="text" class="form-control" id="newUsername" name="new_username" required>
          </div>
          <div class="mb-3">
            <label for="editPassword" class="col-form-label">Password ใหม่:</label>
            <input type="password" class="form-control" id="editPassword" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </form>
      </div>
    </div>
  </div>
</div>