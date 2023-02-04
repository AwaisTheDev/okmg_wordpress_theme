import gulp from "gulp";
import yargs from "yargs";
import { hideBin } from 'yargs/helpers'
import dartSass from "sass";
import gulpSass from "gulp-sass";
import cleanCSS from "gulp-clean-css";
import gulpif from "gulp-if";
import sourcemaps from 'gulp-sourcemaps';
import { deleteAsync } from 'del';
import imagemin from 'gulp-imagemin';
import webpack from "webpack-stream";
import browserSync from "browser-sync";
import postcss from "postcss";
import autoprefixer from "autoprefixer";



const PRODUCTION = yargs(hideBin(process.argv)).argv.prod;
const sass = gulpSass(dartSass);

const server = new browserSync.create();


const paths = {
    styles: {
        src: 'src/assets/scss/bundle.scss',
        dest: 'dist/assets/css'
    },
    images: {
        src: "src/assets/images/**/*.{png,jpg,jpeg,svg,gif}",
        dest: "dist/assets/images",
    },
    scripts: {
        src: "src/assets/js/bundle.js",
        dest: "dist/assets/js"

    },
    others: {
        src: [
            'src/assets/**/*',
            '!src/assets/{scss,js,images}',
            '!src/assets/{scss,js,images}/**/*'
        ],
        dest: 'dist/assets'
    }
}

export const serve = (done) => {
    server.init({
        proxy: "http://localhost/okmg-theme/"
    });
    done();
}

export const reload = (done) => {
    server.reload();
    done();
}


export const clean = () => deleteAsync(['dist']);


export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({ compatibility: 'ie8' })))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dest))
}


export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env']
                            }
                        }
                    }
                ]
            },
            output: {
                filename: 'bundle.js'
            },
            devtool: !PRODUCTION ? 'inline-source-map' : false
        }
        ))
        .pipe(gulp.dest(paths.scripts.dest))
}

export const images = () => {
    return gulp
        .src(paths.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dest));
};

export const copy = () => {
    return gulp.src(paths.others.src)
        .pipe(gulp.dest(paths.others.dest))
}

export const watch = () => {
    gulp.watch("src/assets/scss/**/*.scss", gulp.series(styles, reload));
    gulp.watch("src/assets/**/*.js", gulp.series(scripts, reload));
    gulp.watch("**/*.php", reload);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch(paths.others.src, gulp.series(copy, reload));
}


export const build = gulp.series(
    clean,
    gulp.parallel(styles, scripts, images, copy)
);

export const dev = gulp.series(
    clean,
    gulp.parallel(styles, scripts, images, copy),
    serve,
    watch
);


export default dev;