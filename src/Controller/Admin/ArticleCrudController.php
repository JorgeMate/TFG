<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\{IdField, TextField, AssociationField, DateField};

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('ref'),
            //TextField::new('website'),
            AssociationField::new('Source')->setFormTypeOption('choice_label', 'name'),
            DateField::new('published_date', 'Published at')->setTextAlign('center'),
            DateField::new('start_date', 'Applies from')->setTextAlign('center'),
        ];
    }
    
}
