import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },

  {
    path: 'signup',
    loadChildren: () => import('./signup/signup.module').then( m => m.SignupPageModule)
  },
  {
    path: 'home1',
    loadChildren: () => import('./home1/home1.module').then( m => m.Home1PageModule)
  },
  {
    path: 'about',
    loadChildren: () => import('./about/about.module').then( m => m.AboutPageModule)
  },
  {
    path: 'main',
    loadChildren: () => import('./main/main.module').then( m => m.MainPageModule)
  },
  {
    path: 'c1',
    loadChildren: () => import('./c1/c1.module').then( m => m.C1PageModule)
  },
  {
    path: 'c2',
    loadChildren: () => import('./c2/c2.module').then( m => m.C2PageModule)
  },
  {
    path: 'c3',
    loadChildren: () => import('./c3/c3.module').then( m => m.C3PageModule)
  },
  {
    path: 'c4',
    loadChildren: () => import('./c4/c4.module').then( m => m.C4PageModule)
  },
  {
    path: 'c5',
    loadChildren: () => import('./c5/c5.module').then( m => m.C5PageModule)
  },
  {
    path: 'log',
    loadChildren: () => import('./log/log.module').then( m => m.LogPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
