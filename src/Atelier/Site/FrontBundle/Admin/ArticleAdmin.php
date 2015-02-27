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
        ->add('title', 'text', array('label' => 'Article Title'))
        ->add('author', 'entity', array('class' => 'Application\Sonata\UserBundle\Entity\User'))
        ->add('summary')
        ->add('description')
        ->add('is_enabled', 'checkbox')
    ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
        ->add('title')
        ->add('author')
    ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
        ->addIdentifier('id')
        ->add('title')
        ->add('summary')
    ;
  }

} 