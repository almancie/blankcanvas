(function () {
    function Parallax3d(settings) {
        let el = settings.el;

        if (typeof settings.el === 'string') el = document.querySelector(el);

        // main Atropos container (layer 1)
        const main = document.createElement('div');
        main.classList.add('atropos');
        settings.el = main;

        // scale container (layer 2)
        const scale = document.createElement('div');
        scale.classList.add('atropos-scale');

        // rotate container (layer 3)
        const rotate = document.createElement('div');
        rotate.classList.add('atropos-rotate');

        // inner container (layer 4)
        const inner = document.createElement('div');
        inner.classList.add('atropos-inner');

        if (settings.wrapContent) {            
            [...el.children].forEach(child => {
                inner.appendChild(child);
            });
            
            el.appendChild(main);
        } else {
            el.parentNode.insertBefore(main, el);
            inner.appendChild(el);
        }

        main.appendChild(scale);
        scale.appendChild(rotate);
        rotate.appendChild(inner);

        return Atropos(settings);
    }

    window.Parallax3d = Parallax3d;
})()