// 材料追加ボタン押下時アクション
function addTableTr() {
    let table = document.getElementById("table");

    let rowCount = table.rows.length;

    const Max_RowCount = 15;

    if (rowCount > Max_RowCount) {
        alert("これ以上追加できません。");
        exit;
    }

    let row = table.insertRow(-1);
    let cell1 = row.insertCell(-1);
    let cell2 = row.insertCell(-1);
    let cell3 = row.insertCell(-1);

    cell1.innerHTML = '<input type="text" name="ingredient_name[]" class="form-control pt-2 mb-1" maxlength=50>';
    cell2.innerHTML = '<input type="text" name="quantity[]" class="form-control pt-2 mb-1" maxlength=20>';
    cell3.innerHTML = '<input type="button" value="削除" class="delete_button btn btn-danger btn-sm" onclick="coldelete(this)">';
}

// フォーム削除ボタン押下時アクション
function coldelete(obj) {
    tr = obj.parentNode.parentNode;
    tr.parentNode.deleteRow(tr.sectionRowIndex);
}
