<?php
include('include/Connection.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Document</title>
        <style>
            .back{
                margin: 20px 0 0 50px;
            }
            form.mb-3 > input{
                width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-header  mb-3 p-4 text-white text-center bg-warning">
                <h5>Register Category</h5>
            </div>
            <a href="index.php">
                <button class="back btn btn-primary">Back</button>
            </a>
            <div class=" p-5 mb-5border border-1px-red card-body">
                <form action="./category/add-category.php" method="post">
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" name="category_name">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>

        <div class="card  m-5">
        <table class="table">
            <thead>
                <th scope="col">Category Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
            <?php include('./category/get-categories.php');
            foreach($data as $row):?>
                <tr scope="row" data-category-id="<?php echo $row['category_id'] ?>">
                    <td><?php echo $row['category_id'] ?></td>
                    <td class="category-name"><?php echo $row['category_name'] ?></td>
                    <td>
                        <button type="button" class="btn btn-success update-button" data-bs-toggle="modal" data-bs-target="#editModal">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Remove Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="category/delete-category.php" method="post">
                        <div class="mb-3">
                            <label for="removeCategoryButton" class="form-label">Are you sure do you want to remove <span id="categoryName"></span>?</label>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit" id="removeCategoryButton">Yes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="./category/edit-category.php" method="post">
                        <div class="mb-3">
                            <label for="CategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="CategoryName" name="category_name">
                        </div>
                        <button type="submit" class="btn btn-success" id="editCategoryButton">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#deleteModal').addEventListener('show.bs.modal', (event) => {
            const row = event.relatedTarget.closest('tr');
            const id = row.getAttribute('data-category-id');
            const submit = document.querySelector('#deleteModal #removeCategoryButton');
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', id);
        });
        document.querySelector('#editModal').addEventListener('show.bs.modal', event => {
            const row = event.relatedTarget.closest('tr');
            const id = row.getAttribute('data-category-id');
            const submit = document.querySelector('#editModal #editCategoryButton');
            submit.setAttribute('name', 'id');
            submit.setAttribute('value', id);
            document.querySelector('#editModal #CategoryName').value = row.querySelector('.category-name').textContent;
        });
    </script>

    </body>
</html>