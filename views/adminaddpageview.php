<script src="https://cdn.tiny.cloud/1/no_api_key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="infopos">
    <div class="row">
            <form id="createPageForm" method="post">
              <label>Page titel</label><br>
              <input type="text" id="Ptitle" required name="Ptitle" rows="4" cols="50"><br><br>
              <label>Page context</label><br>
              <textarea id="pcontex" name="pcontex">
              </textarea>
              <br><br>
              <input type="checkbox" id="pprite" name="pprite" value="1">
              <label for="pprite">Keep page private</label><br><br>
              <input type="checkbox" id="pstaff" name="pstaff" value="1">
              <label for="pstaff">member only</label><br><br>
              <button type="submit" name="createPageForm" class="btn btn-success">Add page</button>
              <a class="btn btn-danger" href="./adminpage.php" role="button">Cancel</a>
            </form>
        </div>
</div>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
      toolbar: 'casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
    });
  </script>