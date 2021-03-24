<script>
    $(document).ready(function(){
      
        $('#input-search').on('keyup', function(){
            var product_name = $(this).val();
            var category_id = $('#category_id').val();
        

            $.ajax({
                url:"search/product/by/category"+"/"+category_id+"/"+product_name,
                type:'get',
                success:function(data){
                   $('#search-result').empty();
                    $('#search-result').html(data);
                }
            });
        });
    });
</script>