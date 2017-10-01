<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 23.09.2017
 * Time: 16:10
 */


namespace Ch\ShopBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Ch\ShopBundle\Entity\Category;
use Ch\ShopBundle\Entity\Product;

class CategoryAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array(
                'label' => 'Category Name'
            ))
            /*->add('category', 'entity', array(
                'class' => 'Ch\ShopBundle\Entity\Category'
            ))
            */
            // if no type is specified, SonataAdminBundle tries to guess it
            ->add('description', 'text', array(
                'label' => 'Product description'
            ))
            ->add('available')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('available');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')

            ->add('description')
            ->add('available')

        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('description')
            ->add('available')

        ;
    }
}