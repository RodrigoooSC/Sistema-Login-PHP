<?php
include_once 'verifica_login.php';
include_once '../config.php';
?>

<?php include_once(HEADER_TEMPLATE); ?>

<div class="container">
    <div class="conteudo">
        <div class="row">
            <div class="col-auto me-auto">
                <span class="acesso-entrada">Olá <strong><?php echo $_SESSION['nome_usuario']; ?></strong>, seja bem-vindo ao Conteúdo Exclusivo</span>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-secondary btn-sm-" onclick="sair();">Clique para sair</button>
            </div>
        </div>
        <br>
        <div class="conteudo-1">
            <dl class="row">
                <dt class="col-sm-3">Description lists</dt>
                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                <dt class="col-sm-3">Term</dt>
                <dd class="col-sm-9">
                    <p>Definition for the term.</p>
                    <p>And some more placeholder definition text.</p>
                </dd>

                <dt class="col-sm-3">Another term</dt>
                <dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>

                <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                <dd class="col-sm-9">This can be useful when space is tight. Adds an ellipsis at the end.</dd>

                <dt class="col-sm-3">Nesting</dt>
                <dd class="col-sm-9">
                    <dl class="row">
                        <dt class="col-sm-4">Nested definition list</dt>
                        <dd class="col-sm-8">I heard you like definition lists. Let me put a definition list inside your definition list.</dd>
                    </dl>
                </dd>
            </dl>
        </div>
        <br>
        <h3>HISTORY, PURPOSE AND USAGE</h3>
        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:

            “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”
            The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.

            The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.</p>
    </div>
</div>


<?php include_once(FOOTER_TEMPLATE); ?>