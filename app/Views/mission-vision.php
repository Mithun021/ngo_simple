<?= $this->extend("layouts/master") ?>

<?=  $this->section("body-content"); ?>

<style>
    .card-header{
        background-color: #dc3545 !important;
    }
    .card-header h4{
        color: #fff;
    }
</style>

<?= view('layouts/breadcumbs') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mt-2">
           <div class="card">
            <div class="card-header">
                <h4>Our Mission</h4>
            </div>
            <div class="card-body">
                <p><?= $mission_vision['mission'] ?></p>
            </div>
           </div>
        </div>

        <div class="col-md-6 mt-2">
           <div class="card">
            <div class="card-header">
                <h4>Our Vision</h4>
            </div>
            <div class="card-body">
                <p><?= $mission_vision['vision'] ?></p>
            </div>
           </div>
        </div>

        <div class="col-md-12 mt-2">
           <div class="card">
            <div class="card-header">
                <h4> Core Values</h4>
            </div>
            <div class="card-body">
                <p><b>1. Compassion:</b> We approach our work with empathy and a deep understanding of the
challenges faced by the communities we serve. Compassion is at the heart of everything we
do, guiding us to make a meaningful difference in the lives of those in need.</p>
<p><b>2. Integrity:</b> We uphold the highest standards of integrity in all our actions. Transparency,
accountability, and ethical conduct are the cornerstones of our foundation, ensuring that our
efforts are genuine and impactful.</p>
<p><b>3. Empowerment:</b> We believe in empowering individuals by providing them with the
resources and opportunities to achieve their full potential. Our programs are designed to
foster self-reliance and confidence, enabling people to take charge of their futures.</p>
<p><b>4. Collaboration:</b> We recognize the power of collaboration and actively seek partnerships
with other organizations, communities, and stakeholders. By working together, we can
amplify our impact and reach more individuals in need.
</p>
            </div>
           </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>