<?php

namespace App\Controller\Admin;

use App\Entity\Source;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\{IdField, TextField, AssociationField, DateField};

class SourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Source::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            //TextField::new('website'),
            AssociationField::new('Authority')->setFormTypeOption('choice_label', 'name'),
            DateField::new('published_date', 'Published at')->setTextAlign('center'),
        ];

    }
    
}
