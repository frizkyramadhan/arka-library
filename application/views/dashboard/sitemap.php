    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1><?= $subtitle ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <ol>
          <?php foreach ($sitemap_category as $sg) : ?>
            <li>
              <?= $sg->category_name ?>
            </li>
            <?php $sitemap_subcategory = $this->db->query("select * from subcategories where category_id = '$sg->id' order by subcategory_name asc ")->result() ?>
            <?php if ($sitemap_subcategory) : ?>
              <ol>
                <?php foreach ($sitemap_subcategory as $sc) : ?>
                  <li><?= $sc->subcategory_name ?></li>
                  <?php $sitemap_collection = $this->db->query("select * from collections where subcategory_id = '$sc->id' order by collection_name asc ")->result() ?>
                  <?php if ($sitemap_collection) : ?>
                    <ol>
                      <?php foreach ($sitemap_collection as $cl) : ?>
                        <li><?= $cl->collection_name ?></li>
                        <?php $sitemap_file = $this->db->query("
                        select attachments.collection_id, attachments.collection_file, collections.collection_name, collections.subcategory_id, departments.department_code, categories.slug
                        from attachments 
                        join collections on attachments.collection_id = collections.id 
                        join subcategories on collections.subcategory_id = subcategories.id 
                        join categories on subcategories.category_id = categories.id 
                        join departments on collections.department_id = departments.id 
                        where collection_id = '$cl->id' 
                        order by collection_file asc ")->result() ?>
                        <?php if ($sitemap_file) : ?>
                          <ol>
                            <?php foreach ($sitemap_file as $fl) : ?>
                              <li>
                                <a target="blank" href="<?= base_url('uploads/' . $fl->department_code . '/' . $fl->slug . '/' . $fl->subcategory_id . '/' . $fl->collection_file) ?>"><?= $fl->collection_file ?></a>
                              </li>
                            <?php endforeach; ?>
                          </ol>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ol>
                  <?php endif; ?>
                <?php endforeach ?>
              </ol>
            <?php endif ?>
          <?php endforeach ?>
        </ol>
      </section>
      <!-- /.content -->
      <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
      </a>
    </div>
    <!-- /.content-wrapper -->