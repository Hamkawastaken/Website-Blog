<?php

require_once __DIR__ . '/../../../DB/Connection.php';
require_once __DIR__ . '/../../../Model/Model.php';
require_once __DIR__ . '/../../../Model/Post.php';

$keyword = $_GET['keyword'];
$posts = new Post();
$posts = $posts->search($keyword);

?>

<table class="text-left w-full whitespace-nowrap text-sm">
											<thead class="text-gray-700">
												<tr class="font-semibold text-gray-600">
													<th scope="col" class="p-4">Id</th>
													<th scope="col" class="p-4">Post Title</th>
													<th scope="col" class="p-4">Image</th>
													<th scope="col" class="p-4">Author</th>
													<th scope="col" class="p-4">Category</th>
													<th scope="col" class="p-4">Actions</th>
												</tr>
											</thead>
											<tbody>
                        <?php $no = 0;?>
                        <?php foreach ($posts as $post) :?>
                        <?php $no++;?>
						<tr>
						<td class="p-4 font-semibold text-gray-600"><?= $no?></td>
						<td class="p-4">
                            <div class="flex flex-col gap-1">
                                <h3 class="font-semibold text-gray-600"><?= $post['title']?></h3>
							</div>
						</td>
						<td class="p-4">
                            <div class="flex flex-col gap-1">
                                <img src="../../../images/<?= $post['attachment']?>" alt="" style="width: 64px; height: 48px; object-fit: cover;">
							</div>
						</td>
						<td class="p-4">
                            <div class="flex flex-col gap-1">
                                <h3 class="font-semibold text-gray-600"><?= $post['full_name']?></h3>
							</div>
						</td>
						<td class="p-4">
                            <div class="flex flex-col gap-1">
                                <h3 class="font-semibold text-gray-600"><?= $post['name_category']?></h3>
							</div>
						</td>
						<td class="p-4 flex gap-x-1">
                            <button class="inline-flex items-center py-[10px] px-[10px] rounded-2xl font-semibold text-white" style="background-color: rgb(34 197 94);"><a href="edit-tags.php?id=<?=$tag['id_tag']?>">Edit</a><i class="ti ti-pencil" style="margin-left: 4px;"></i></button>
                            <button class="inline-flex items-center py-[10px] px-[10px] rounded-2xl font-semibold text-white" style="background-color: rgb(239 68 68);" onclick="return alertDelete(event, '<?= $tag['id_tag']?>')"><i class="ti ti-trash" style="margin-left: 4px;" ></i>Delete</button>
						</td>
						</tr>
                        <?php endforeach;?>
											</tbody>
										</table>