<?php
/**
 * Created by PhpStorm.
 * User: jiboy
 * Date: 27/02/15
 * Time: 12:52
 */

namespace Atelier\Site\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin {

  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper

        ->with('Article')
          ->add('is_enabled', 'checkbox')
          ->add('title', 'text', array('label' => 'Article Title'))
          ->add('summary')
          ->add('description')
        ->end()

        ->with('Media')
          ->add('media_pict', 'sonata_media_type', array(
                  'label' => 'Photo',
                  'required' => FALSE,
                  'provider' => 'sonata.media.provider.image',
                  'context'  => 'article')
          )
          ->add('media_video', 'sonata_media_type', array(
                  'label' => 'Link to youtube video',
                  'required' => FALSE,
                  'provider' => 'sonata.media.provider.youtube',
                  'context'  => 'article')
          )
          ->add('media_file', 'sonata_media_type', array(
                  'label' => 'File',
                  'required' => FALSE,
                  'provider' => 'sonata.media.provider.file',
                  'context'  => 'article')
          )
        ->end()

        ->with('Event')
          ->add('events', 'sonata_type_collection', array(
            // Prevents the "Delete" option from being displayed
              'required' => FALSE,
              'type_options' => array('delete' => true)
          ), array(
          ))
        ->end()
    ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
        ->add('title')
        ->add('isEnabled')
    ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
        ->addIdentifier('id')
        ->add('is_enabled')
        ->add('title')
        ->add('summary')
        ->add('created_at', 'datetime')
        ->add('updated_at', 'datetime')
    ;
  }

  public function prePersist($data) {
    $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
    $current_date =  date_create(date('Y-m-d H:i:s'));
    $data->setAuthor($user);
    $data->setCreatedAt($current_date);
  }

  public function preUpdate($data) {
    $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
    $current_date =  date_create(date('Y-m-d H:i:s'));
    $data->setAuthor($user);
    $data->setUpdatedAt($current_date);
  }

} 