<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-sm-flex align-items-center justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">اضافة</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form @if (Route::currentRouteName() != 'dashboard.reasons.index') action="{{ route('dashboard.settings.add') }}" @else action="{{ route('dashboard.reasons.store') }}" @endif method="POST" id="add" class="form text-right">
                @csrf
                <input type="hidden" name="page" id="page" value="">
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    @if (Route::currentRouteName() == 'dashboard.reasons.index')
                    <label class="form-label">الوصف (اختياري)</label>
                    <textarea name="description" cols="30" rows="10" style="resize: none;" class="form-control"></textarea>
                    @error('description')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @else
                    <label for="value" class="form-label">القيمة</label>
                    <input type="text" class="form-control" name="value">
                    @error('value')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
          <a class="btn btn-primary text-white" onclick="$('#add').submit()">اضافة</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-sm-flex align-items-center justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">اضافة</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form @if (Route::currentRouteName() != 'dashboard.reasons.index') action="{{ route('dashboard.settings.update') }}" @else action="{{ route('dashboard.reasons.update') }}" @endif method="POST" id="updateData" class="form text-right">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="oldname" id="oldname" value="">
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                  @if (Route::currentRouteName() == 'dashboard.reasons.index')
                  <label class="form-label">الوصف (اختياري)</label>
                  <textarea name="description" id="description" cols="30" rows="10" style="resize: none;" class="form-control"></textarea>
                  @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  @else
                    <label for="value" class="form-label">القيمة</label>
                    <input type="text" class="form-control" name="value" id="value">
                    @error('value')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
          <a class="btn btn-primary text-white" onclick="$('#updateData').submit()">حفظ</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function add(data){
        $('#page').val(data);
    }
    function change(data, name, value){
        $('#id').val(data);
        $('#name').val(name);
        $('#oldname').val(name);
        @if (Route::currentRouteName() != 'dashboard.reasons.index')
        $('#value').val(value);
        @else
        $('#description').html(value);
        @endif
    }
  </script>