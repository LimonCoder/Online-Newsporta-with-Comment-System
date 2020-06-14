
<?php
require_once ('include/config.php');
$deletesl = 1;
$query = "SELECT * FROM tblecatagory WHERE isActive = 0 ORDER BY id DESC";
$results = mysqli_query($con,$query);
while($row = mysqli_fetch_array($results)){ ?>
    <tr id="deleteid<?=$row['id']?>">
        <td><?=$deletesl++?></td>
        <td><?=$row['catagoryname']?></td>
        <td><?=$row['catagorydescription']?></td>
        <td><?=$row['Postdate']?></td>
        <td><?=$row['UpdateDate']?></td>
        <td>
            <button  class="deleteback btn btn-info" id="<?=$row['id'];?>"><i class="fa fa-undo"></i></button>
            <button  class="deleteconfrim btn btn-danger" id="<?=$row['id']?>"><i class="fa fa-trash-o"></i></button>
        </td>
    </tr>


<?php    }
?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">

	$(document).ready(function(){

		$(".deleteback").click(function(){
			var id = $(this).attr('id');
			$(".restore").show();

			setTimeout(function(){
				$(".restore").hide();
			},1500);
			
			$.ajax({
				url:'catagoryundo.php',
				type:'post',
				data:{
					delid :id
				},
				success:function(res){
					if (res == 1) {
						
						setTimeout(function(){
							window.open("managecatagory.php","_self");
						},1500);
					}
				}
			})
		})

		$(".deleteconfrim").click(function(e){
			e.prevent
			var confrimid = $(this).attr('id');

			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
						$.ajax({
							url:'confrimdelete.php',
							type:'post',
							data:{
								id:confrimid
							},
							success:function(res){
								if (res == 1) {
									Swal.fire(
										'Deleted!',
										'Your file has been deleted.',
										'success'
										)
									window.open("managecatagory.php","_self");


								}else{
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: 'Something went wrong!',
										footer: '<a href>Why do I have this issue?</a>'
									})
								}
							}
						})


					
				}
			})
		})

	})

</script>