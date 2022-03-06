<script src="https://cdn.tiny.cloud/1/l97uwon26tn13gmapos74kh97tcstckx906hvicwjbgtjg29/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="infopos">
    <div class="row">
        <!-- <div class="col w-75"> -->
            <form id="createPageForm" method="post">
            <label>Page titel</label><br>
            <input type="text" id="Ptitle" name="Ptitle" rows="4" cols="50"><br><br>
            <label>Page context</label><br>
            <textarea id="pcontex" name="pcontex">
            </textarea>
            <br><br>
            <input type="checkbox" id="pprite">
            <label for="pprite">Keep page private</label><br><br>
            <input type="checkbox" id="pstaff">
            <label for="pstaff">Admin only</label><br><br>
            <input type="submit" value="Submit" name="createPageForm">
            </form>
        </div>
        </div>
</div>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>