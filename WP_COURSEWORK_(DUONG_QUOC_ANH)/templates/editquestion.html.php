<form action="" method="post">
    <input type="hidden" name="questionid" value="<?=$question['id'];?>">
    <label for='ask'>Edit your question here</label>
    <textarea name="ask" rows="3" cols="40">
    <?=$question['ask']?>
    </textarea>
    <label for='questionimg'>Change image</label>
    <input type="text" name="questionimg" id="Picture-link" value="<?=$question['questionimg'];?>">
    <input type="submit" name="submit" value="Save">
</form>